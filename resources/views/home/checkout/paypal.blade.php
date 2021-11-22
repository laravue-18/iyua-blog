@extends('home.layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-5">Checkout</h2>
        <div class="card shadow border">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">

                        <!--
                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" id="paypal_standard_checkout" method="POST">
                            <input value="Click here if you are not redirected within 10 seconds..." type="submit">
                            <input type="hidden" name="business" value="test@webkul.com">
                            <input type="hidden" name="invoice" value="10">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="paymentaction" value="sale">
                            <input type="hidden" name="return" value="http://bagisto.test/paypal/standard/success">
                            <input type="hidden" name="cancel_return" value="http://bagisto.test/paypal/standard/cancel">
                            <input type="hidden" name="notify_url" value="http://bagisto.test/paypal/standard/ipn">
                            <input type="hidden" name="charset" value="utf-8">
                            <input type="hidden" name="item_name" value="Default">
                            <input type="hidden" name="amount" value="23.0000">
                            <input type="hidden" name="tax" value="0.0000">
                            <input type="hidden" name="shipping" value="0">
                            <input type="hidden" name="discount_amount" value="0.0000">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="upload" value="1">
                            <input type="hidden" name="item_number_1" value="9">
                            <input type="hidden" name="item_name_1" value="Shirt">
                            <input type="hidden" name="quantity_1" value="1">
                            <input type="hidden" name="amount_1" value="23.0000">
                            <input type="hidden" name="item_number_2" value="Free Shipping">
                            <input type="hidden" name="item_name_2" value="Shipping">
                            <input type="hidden" name="quantity_2" value="1">
                            <input type="hidden" name="amount_2" value="0">
                            <input type="hidden" name="tax_cart" value="0.0000">
                            <input type="hidden" name="discount_amount_cart" value="0.0000">
                            <input type="hidden" name="city" value="San Jose">
                            <input type="hidden" name="country" value="US">
                            <input type="hidden" name="email" value="a@gmail.com">
                            <input type="hidden" name="first_name" value="Faf">
                            <input type="hidden" name="last_name" value="asdf">
                            <input type="hidden" name="zip" value="95121">
                            <input type="hidden" name="state" value="CA">
                            <input type="hidden" name="address1" value="345 Lark Ave">
                            <input type="hidden" name="address_override" value="1">
                        </form>
                        -->
                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="buyNow">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="abrakadabra3232@yandex.ru">
                            <input type="hidden" name="item_name" value="{{ session('cart.name') }}">
                            <input type="hidden" name="item_number" value="MEM32507725">
                            <input type="hidden" name="amount" value="{{ session('cart.price') }}">
                            <input type="hidden" name="quantity" value="{{ session('cart.qty') }}">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="return" value="{{ route('checkout.success') }}">
                            <input type="hidden" name="cancel_return" value="{{ route('checkout.cancel') }}">
                            <input type="image" name="submit"
                                   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                                   alt="PayPal - The safer, easier way to pay online">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-bottom')
    <script>
        $(function(){
            $("form#buyNow").submit();
        })
    </script>

@endsection
