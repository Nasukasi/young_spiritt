@extends('admin.layout.template')
@section('page_title')
    Young spirit-order
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-title">Pending Orders
            </div>
            <div class="card-body">
                    <table>
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
                                        <li>Phone Number: {{$order->phone_number}}</li>
                                    </ul></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
@endsection
