@extends('home.layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-5">Checkout</h2>
        <div class="card shadow border">
            <div class="card-body">
                <h3>Your Order cancelled.</h3>
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
