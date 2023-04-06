
@extends('user_template.layouts.template')
@section('title_page')
    Products
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img"><img src="{{asset($product->product_img)}}" alt="{{asset($product->product_img)}}"></div>

                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    <div class="product-info">
                        <h4 class="shirt_text text-left">{{$product->product_name}}</h4>
                        <p class="price_text text-left">Price  <span style="color: #262626;">${{$product->price}}</span></p>
                    </div>
                    <div class="my-3 product-details">
                        <p class="lead">{{$product->product_long_des}}</p>
                        <ul class="p-2 bg-light my-2">
                            <li>Category-{{$product->product_category_name}}</li>
                            <li>Sub Category-{{$product->product_subcategory_name}}</li>
                            <li>Quatity-{{$product->quantity}}</li>
                        </ul>
                    </div>
                    <div class="btn_main">
                        <form action="{{route('addproducttocart')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id">

                            <div class="form-group">
                                <input type="hidden" value="{{$product->price}}" name="price">
                                <label for="product_quantity">How many piece</label>
                                <input class="form-control" type="number" min='1' placeholder="1" name="quantity">
                            </div>
                            <br>
                            <input class="btn btn-warning" type="submit" value="Add To Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="fashion_section">
            <div id="main_slider" >

                <div class="container">
                    <h5 class="fashion_taital text-left">Related product</h5>
                    <div class="fashion_section_2">
                        <div class="row" id="product-list">
                            @foreach($related_products as $products)
                                <div class="col-lg-4 col-sm-4 product-item">
                                    <div class="box_main">
                                        <div class="tshirt_img"><img src="{{asset($products->product_img)}}" alt=" "></div>
                                        <h4 class="shirt_text text-left">{{$products->product_name}}</h4>
                                        <p class="price_text text-left">Price  <span style="color: #262626;">$ {{$products->price}}</span></p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
