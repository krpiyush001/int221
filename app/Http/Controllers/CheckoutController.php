<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Order;
use Razorpay\Api\Api;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \Cart::getContent();
        return view('pages.checkout')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
            'address' => ['required'],
            'town' => ['required'],
            'state' => [ 'required'],
            'postcode' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
        ]);
        $items = \Cart::getContent();
        $product_details = [];
        foreach($items as $item){
            array_push($product_details, ['slug' => $item->associatedModel->slug, 'quantity' =>$item->quantity,'size' => reset($item->attributes)[0] ]);
        }

        $api_key = 'rzp_live_ct4nTnLWEOSNL0';
        $api_secret = 'BpOPkJnaV8EGRW466n0V66o8';
        $api = new Api($api_key, $api_secret);

        $receipt_id = Str::random(20);
        $order = $api->order->create(array(
            'receipt' => $receipt_id,
            'amount' => \Cart::getTotal() * 100,
            'payment_capture' => 1,
            'currency' => 'INR'
            )
          );
        
        $response = [
            'orderId'=> $order['id'],
            'razorpayId' => $api_key,
            'amount' => \Cart::getTotal() * 100,
            'name' => $request->input('name'),
            'email'=> $request->input('email'),
            'contact'=> $request->input('phone'),
            'address' => $request->input('address'),
            'orderNote' => $request->input('order_note'),
            'town' => $request->input('town'),
            'state' => $request->input('state'),
            'postcode' => $request->input('postcode'),
            'product_details' => json_encode($product_details), 
        ];

        return view('pages.payment',compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Live Mode
        $api_key = 'rzp_live_ct4nTnLWEOSNL0';
        $api_secret = 'BpOPkJnaV8EGRW466n0V66o8';


        //Test
        //$api_key = 'rzp_test_z4jOsMXfX3AOTX';
        //$api_secret = 'IP7KgcSWxdkzvZMRVkBOlplJ';


        try {
            $api = new Api($api_key, $api_secret);
            $attributes  = array('razorpay_signature'  => $request->rzp_signature,  'razorpay_payment_id'  => $request->rzp_paymentid ,  'razorpay_order_id' => $request->rzp_orderid);
            $order  = $api->utility->verifyPaymentSignature($attributes);

            $order1 = new Order;
            $order1->name = $request->input('name');
            $order1->address = $request->input('address');
            $order1->town = $request->input('town');
            $order1->state = $request->input('state');
            $order1->postcode =$request->input('postcode');
            $order1->phone =$request->input('contact');
            $order1->email =$request->input('email');
            $order1->order_note =$request->input('order_note');
            $order1->product_details =$request->input('product_details');
            $order1->order_track_id = Str::random(8);
            $order1->amount = \Cart::getTotal();
            $order1->rpy_orderid = $request->rzp_orderid;
            $order1->rpy_signature = $request->rzp_signature;
            $order1->rpy_payment_id = $request->rzp_paymentid;
            $order1->save();
            notify()->success('Your Order has been added successfuly!','Success!');

            //sending SMS:::
            $fields = array(
                "sender_id" => "FSTSMS",
                "message" => "Greeting, Your order has been successfully placed. The order track id for your order is {$order1->order_track_id}. You can track your order status from the website track your order option.Thank you for ordering from kundanswear.com.
                With Regard,
                Kundans",
                "language" => "english",
                "route" => "p",
                "numbers" => "9505854124,{$request->input('contact')}",
            );
            
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode($fields),
              CURLOPT_HTTPHEADER => array(
                "authorization: MFXJarh12iEfCHpmvskPO74lwBGQ8V6Nd0LqnuAytITWDcY9xoBndK3LGPvAQbV8OwghrD67ok4SzIXE",
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
                \Cart::clear();
                return redirect('/');
            }
            
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
