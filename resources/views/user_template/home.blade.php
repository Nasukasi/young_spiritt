
@extends('user_template.layouts.template')
@section('title_page')
    Home
@endsection
@section('main-content')
    <!-- fashion section start -->
    <div class="fashion_section">
        <div id="main_slider" >

                    <div class="container">
                        <h1 class="fashion_taital">All product</h1>
                        <div class="fashion_section_2">
                            <div class="row" id="product-list">
                                @foreach($allproducts as $product)
                                    <div class="col-lg-4 col-sm-4 product-item">
                                        <div class="box_main">

                                            <div class="tshirt_img"><img src="{{asset($product->product_img)}}" alt="{{asset($product->product_img)}}"></div>
                                            <h4 class="shirt_text text-left">{{$product->product_name}}</h4>
                                            <p class="price_text text-left">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                                <div class="seemore_bt"><a href="{{route('singleproduct',[$product->id,$product->slug])}}">See More</a></div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                            <div class="text-center">
                                <button id="show-more-btn" class="btn btn-primary">Show More</button>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <!-- fashion section end -->
@endsection
