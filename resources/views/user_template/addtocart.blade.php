@extends('user_template.layouts.template')
@section('title_page')
    Cart
@endsection
@section('main-content')

    <div class="row">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>

        @endif
        <div class="col-12">
            <div class="box_main">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>total</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $total = 0;
                        @endphp

                            @foreach($cart_items as $item)
                                <tr>
                                    @php
                                        $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                                        $img = App\Models\Product::where('id',$item->product_id)->value('product_img');
                                        $price = App\Models\Product::where('id',$item->product_id)->value('price');
                                    @endphp
                                    <td><img src="{{asset($img)}}" style="height: 50px"></td>
                                    <td>{{$product_name}}</td>
                                    <td>{{$price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td><a href="{{route('removecartitem',$item->id)}}" class="btn btn-warning">Remove</a> </td>
                                </tr>
                                @php
                                $total = $total +$item->price;
                                @endphp
                        @endforeach
                        @if($total>0)


                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>

                                    <td>Total:</td>
                                    <td class="">{{$total}}</td>
                                    @if($total <=0)
                                    <td><a href="" class="btn btn-primary disabled">Checkout</a></td>
                                    @else
                                        <td><a href="{{route('shipping')}}" class="btn btn-primary">Checkout</a></td>

                                    @endif
                                    @endif
                                </tr>




                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
