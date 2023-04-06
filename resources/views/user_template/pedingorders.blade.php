@extends('user_template.layouts.user_profile_template')
@section('title_page')
    pending-order
@endsection
@section('profilecontent')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>

    @endif
    <table class="table">
        <tr>
            <th>Product ID</th>
            <th>Price</th>
        </tr>
                @foreach($pending_orders as $order)

                <tr>
                    @php
                        $product_id = App\Models\Order::where('id',$order->product_id)->where('status','pending')->value('product_id');
                        $price = App\Models\Order::where('id',$order->product_id)->where('status', 'pending')->value('total_price');
                    @endphp
                    <td>{{$product_id}}</td>

                    <td>{{$price}}</td>
                </tr>

            @endforeach



    </table>
@endsection
