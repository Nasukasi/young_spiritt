@extends('admin.layout.template')
@section('page_title')
    Young spirit-order
@endsection
@section('content')
    <div class="container my-5">
        <div class="card p-4">

            <div class="card-title text-center"><h2>Pending Orders</h2>
            </div>
            <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>User Id</th>
                            <th>shipping Information</th>
                            <th>Product Id</th>
                            <th>Quantity</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($pending_orders as $order)
                            <tr>
                                <td>{{$order->user_id}}</td>
                                <td><ul>
                                        <li>Phone Number: {{$order->shipping_phonenumbeR}}</li>
                                        <li>City: {{$order->shipping_city}}</li>
                                        <li>Address {{$order->shipping_address}}</li>
                                    </ul></td>
                                <td>{{$order->product_id}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->status}}</td>
                                <td><a href="" class="btn btn-success">Accept</a></td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
@endsection
