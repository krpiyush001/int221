@extends('layouts.app')

@section('content')

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Shop
    </h2>
</section>	
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('index')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="#" class="stext-109 cl8 hov-cl1 trans-04">
            Shop
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="#" class="stext-109 cl8 hov-cl1 trans-04">
            {{$category->name}}
        </a>
    </div>
</div>



<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <h3 class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                    {{$category->name}} - {{count($products)}} items
                </h3>
            </div>
        </div>

        <div class="row isotope-grid">


            @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ Voyager::image( $product->main_image ) }}" alt="IMG-PRODUCT">

                                <a href="{{ route('product.show',$product->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Show Product
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{ route('product.show',$product->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{$product->name}}
                                    </a>

                                    <span class="stext-105 cl3">
                                        ₹ {{$product->price}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            


        </div>
        {{ $products->links() }}
    </div>
</div>
@endsection