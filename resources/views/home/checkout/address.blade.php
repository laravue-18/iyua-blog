@extends('home.layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-5">Checkout</h2>
        <div class="card shadow border">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('checkout.post') }}" method="post">
                            @csrf
                            <h3>Shipping Address</h3>
                            <input type="hidden" name="shipping_address" value="true">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="">Street Address</label>
                                <input type="text" class="form-control" name="address1" required>
                            </div>
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control" name="country" required>
                            </div>
                            <div class="form-group">
                                <label for="">State</label>
                                <input type="text" class="form-control" name="state" required>
                            </div>
                            <div class="form-group">
                                <label for="">Zip/Postcode</label>
                                <input type="text" class="form-control" name="postcode" required>
                            </div>
                            <div class="form-group">
                                <label for="">Telephone</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                            <button class="btn btn-secondary">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-bottom')

@endsection
