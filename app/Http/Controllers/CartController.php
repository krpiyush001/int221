<?php

namespace App\Http\Controllers;

use App\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \Cart::getContent();
        return view('pages.cart')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);
        notify()->success('You got 10% off the on the product for being our top 100 customer!','Congratulation!');

        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => 0.9*$product->price,
            'quantity' => $request->input('num-product'),
            'attributes' => array(
                $request->input('size')
            ),
            'associatedModel' => $product
        ));
        Alert::success($product->name, 'is added to Cart');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        \Cart::remove($id);
        return redirect()->route('cart.index');
    }
}
