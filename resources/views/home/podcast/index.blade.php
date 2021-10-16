@extends('home.layouts.app')

@section('content')
    <!-- end space -->
    <div class="container">
        <h2 class="mt-5 mb-3">Podcast</h2>
        <div class="row">
            <div class="col-md-5">
                <img src="{{ $channel['PHOTOLINK'] }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-7">
                <p>Channel ID: {{ $channel['CHANNEL_ID'] }}</p>
                <h4>{{ $channel['NAME'] }}</h4>
                <p>{{ $channel['DESCRIPTION'] }}</p>
            </div>
        </div>

        <h3 class="mt-5 mb-3">Episodes</h3>

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
            @endforeach
        </div>

    </div> <!-- end container -->
@endsection
