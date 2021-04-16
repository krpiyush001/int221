@extends('layouts.app')

@section('content')
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Check Out
		</h2>
    </section>
    <form action="{{ route('checkout.create') }}" method="POST">
        @csrf
    <section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Billing Details
						</h4>
                        <p class="stext-115 cl6 size-50">
                            Full Name *
                        </p>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-10 p-r-30" type="text" name="name" placeholder="Your Full Name" required>
                        </div>
                        <p class="stext-115 cl6 size-50">
                            E-Mail *
                        </p>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-10 p-r-30" type="text" name="email" placeholder="Your Email Address" required>
                        </div>
                        <p class="stext-115 cl6 size-50">
                            Phone Number *
                        </p>
                        <p style="color: red">Recheck your phone number before the confirmation.It will be used in order tracking and contacting you.</p>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input type="number" class="stext-111 cl2 plh3 size-116 p-l-10 p-r-30" type="text" name="phone" placeholder="Your Phone Number" required>
                        </div>
                        
                        <p class="stext-115 cl6 size-50">
                            Address *
                        </p>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-10 p-r-30" type="text" name="address" placeholder="Your Full Delivery Address" required>
                        </div>
                        <p class="stext-115 cl6 size-50">
                            Town/City *
                        </p>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-10 p-r-30" type="text" name="town" placeholder="Your Town/City" required>
                        </div>
                        <p class="stext-115 cl6 size-50">
                            State *
                        </p>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-10 p-r-30" type="text" name="state" placeholder="Your State" required>
                        </div>
                        <p class="stext-115 cl6 size-50">
                            PostCode/Zip Code *
                        </p>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input type="number" class="stext-111 cl2 plh3 size-116 p-l-10 p-r-30" type="text" name="postcode" placeholder="Your PostalCode/ZipCode" required>
                        </div>
                        <p class="stext-115 cl6 size-50">
                            Order Note
                        </p>
                        <div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="order_note" placeholder="Any Order Note for Vendor (Optional)"></textarea>
						</div>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Your Order
                    </h4>
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                ₹ {{\Cart::getSubTotal()}} <span style="color: green">(You got 10% off the actual price for being our top 100 customers!)</span>
                            </span>
                        </div>
                    </div>
					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Order Details:
                            </span>
                        </div>
                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">      
                                @foreach ($items as $item)
                                <div class="p-t-5">
                                    <span class="stext-112 cl8">
                                        {{$item->name}} - {{reset($item->attributes)[0]}}
                                    </span>

                                    <div class="rs1-select2 rs2-select2 bg0 m-b-12 m-t-9">
                                            <p class="stext-111 cl6 p-t-2">
                                                ₹ {{$item->price}} * {{$item->quantity}} = ₹ {{$item->price * $item->quantity}}
                                            </p>
                                    </div>     
                                </div>
                                @endforeach
                            </div>
                        
                        



                    </div>

					

					<div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                ₹ {{\Cart::getTotal()}}
                            </span>
                        </div>
                    </div>
                    <p style="color: red;">Sincerely, check all the details before placing order. All the details provided here will be used.</p><br>
                    <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Place Order
                    </button>
				</div>
			</div>
		</div>
    </section>
    </form>

@endsection