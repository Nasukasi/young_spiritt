
@extends('user_template.layouts.template')
@section('title_page')
    shipping-address
@endsection
@section('main-content')
    <h2>Shipping</h2>
        <h3>Please provide your shipping info</h3>
    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <form action="{{route('addshippingaddress')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city">
                    </div>

                    <div class="form-group">
                        <label for="address_1">Address 1</label>
                        <input type="text" class="form-control" name="address_1">
                    </div>

                    <div class="form-group">
                        <label for="address_2">Address 2</label>
                        <input type="text" class="form-control" name="address_2">
                    </div>

                    <div class="form-group">
                        <label for="postal_code">postal code</label>
                        <input type="text" class="form-control" name="postal_code">
                    </div>


                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number">
                    </div>

                    <input type="submit" value="Next" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
