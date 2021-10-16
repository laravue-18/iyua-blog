@extends('home.layouts.app')

@section('content')
    <div class="container">
        <h2>Store</h2>
        <div class="row">
            <div class="col-md-7 order-md-2 align-middle">
                <h2 class="featurette-heading">Oh yeah, we are here to servce.<br> <span class="text-muted">See for yourself.</span></h2>
                <p>Today's Entreprenuer places a strong emphasis on serving our clients to make well-informed decisions in their business endevors.
                    Whether it be family, commercial or industrial,
                    we believe in the smile of a satisfied customer. </p>
                <!--
                <form class="form-inline float-right">
              <input type="button" value="Get Started Now" class="btn btn-primary">
            </form>
                -->
                <br>
                <br>
            </div>
            <div class="col-md-5 order-md-1">
                <img width="500" class="featurette-image img-fluid mx-auto" src="images/card.png" alt="Generic placeholder image">
            </div>
        </div>

    </div> <!-- end container -->

    <p> &nbsp;</p>
    <div class="container">

        <h2 class="mb-4">Products</h2>

        <div class="row">
            @foreach($products as $product)
                <div class="col-xl-3 col-md-4 col-sm-2">

                    <div class="card">
                        <div class="card-body">
                            <div class="product-img position-relative">
                                <div class="avatar-sm product-ribbon">
                                </div>
                                <img src="{{ asset('images/' . $product->image) }}" alt="" class="img-fluid mx-auto d-block">
                            </div>
                            <div class="mt-4 text-center">
                                <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">{{ $product->name }} </a></h5>

                                <h5 class="my-0"> <b>${{ $product->price }}</b></h5>

                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary mt-4">Buy Now</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
