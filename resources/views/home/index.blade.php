@extends('home.layouts.app')

@section('content')
    <div id="carouselExampleCaption" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/carousel-1.png') }}" alt="..." class="d-block img-fluid">
                <div class="carousel-caption d-none d-md-block text-white-50">
                    <h1 class="text-white">Building the blocks of prosperity one step at a time!</h1>
                    <p>Lets take this journey together.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/carousel-1.png') }}" alt="..." class="d-block img-fluid">
                <div class="carousel-caption d-none d-md-block text-white-50">
                    <h1 class="text-white">Building the blocks of prosperity one step at a time!</h1>
                    <p>Lets take this journey together.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Andrea James</h1>
            <p>Welcome to Today's Entrepreneur - the Broadcast Network that connects Businesses, Entrepreneurs, and Talent with/to their targeted audience globally.
                We call it Today's Entrepreneur (TE) Tuesdays, where we interview and coach successful entrepreneurs as well as under the radar entrepreneurs; health & wellness, business and finance experts - share tangible tips and training.
            </p>
            <a class="btn btn-outline-secondary waves-effect" href="{{ route('pages.show', 'about') }}" role="button">About Me &raquo;</a>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>Build</h2>
                <p>
                    Your dreams of building your own empire should not end up in frustration and struggle, trying to build a brand and aquire customers. Set your journey on a new path of business and self to a rewarding lifestyle that you always wanted.
                </p>
                <p><a class="btn btn-secondary" href="{{ route('pages.show', 'build') }}" role="button">Learn more &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Grow</h2>
                <p>We are with you every step of the way. Get your business ready to grow to the next level with community leverage, niche markets and technology. Watch your new master plan materialise before your eyes. Make money!</p>
                <p><a class="btn btn-secondary" href="{{ route('pages.show', 'grow') }}" role="button">Learn more &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Master</h2>
                <p>Learn how to conquer your dreams with your new master mind that keeps you on pin point decision making and accelerated profits. Network with like-minded entreprenuers for the exchange of ideas, success and pots of gold!</p>
                <p><a class="btn btn-secondary" href="{{ route('pages.show', 'master') }}" role="button">Learn more &raquo;</a></p>
            </div>
        </div>

        <hr>

        <h2>Podcast</h2>

        <div class="row">
            @foreach($episodes as $episode)
                <div class="col-md-3 mb-5">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ $channel['PHOTOLINK'] }}" alt="Card image cap">
                        <div class="card-body">
                            <p>Episode ID: {{ $episode['EPISODE_ID'] }}</p>
                            <h4 class="card-title mt-0">{{ $episode['TITLE'] }}</h4>
                            <p class="card-text">HOST NAME: {{ $episode['HOSTNAME'] }}</p>
                            <p class="card-text">KEYWORDS: {{ $episode['KEYWORDS'] }}</p>
                            <p class="card-text text-truncate">{{ $episode['DESCRIPTION'] }}</p>
                            <a href="{{ route('podcast.show', $episode['EPISODE_ID']) }}" class="btn btn-secondary waves-effect waves-light">Listen Now!</a>
                        </div>
                    </div>
                </div>
                @break($loop->iteration == 4)
            @endforeach
        </div>

    </div> <!-- /container -->
@endsection
