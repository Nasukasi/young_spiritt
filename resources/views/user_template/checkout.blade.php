
@extends('user_template.layouts.template')
@section('title_page')
    Checkout
@endsection
@section('main-content')
    <h2>Final Step To Place Your Order</h2>
    <div class="row">
        <div class="col-8">
            <div class="box_main">
                <h2>Product Will Send At-</h2>
                <p>Address: {{$shipping_address->address_1}}</p>
                <p>City: {{$shipping_address->city}}</p>
                <p>Postal Code: {{$shipping_address->postal_code}}</p>
                <p>Phone Number: {{$shipping_address->phone_number}}</p>
            </div>
        </div>

        <div class="col-4">
            <div class="box_main">
               <h2> Your Final Products Are-</h2>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        @php
                            $total = 0;
                        @endphp

                        @foreach($cart_items as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                                    $price = App\Models\Product::where('id',$item->product_id)->value('price');
                                @endphp
                                <td>{{$product_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                            </tr>
                            @php
                                $total = $total +$item->price;
                            @endphp
                        @endforeach

                            <tr>

                                <td> </td>

                                <td>Total:</td>
                                <td class="">{{$total}}</td>
                            </tr>




                    </table>
                </div>

            </div>
            <form action="{{route('placeorder')}}" method="POST" class="text-right">
                @csrf
                <input type="submit" value="Place Order" class="btn btn-primary mr-3">
            </form>

        </div>
        <br>
        <h1 style="color: white"> 1</h1>
    </div>
@endsection()
