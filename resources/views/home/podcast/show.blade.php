@extends('home.layouts.app')

@section('content')
    <!-- end space -->
    <div class="container">
        <h2 class="mt-5 mb-3">{{ $episode['TITLE'] }}</h2>

        <h5 class="mb-4">CONFERENCE_ID: {{$episode['CONFERENCE_ID']}}</h5>

        <audio class="mb-5" controls>
            <source src="{{ 'https://www.blacktradelines.com/' . $episode['RECORDPATH'] }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

    </div> <!-- end container -->
@endsection
