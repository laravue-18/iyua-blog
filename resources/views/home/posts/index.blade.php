@extends('home.layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-5">Blog Posts</h2>
        @foreach($posts as $post)
            <div class="card mb-4">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                        <img class="card-img img-fluid" src="{{ asset('/images/' . $post->image ) }}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text text-truncate">{{ $post->description }}</p>
{{--                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-secondary waves-effect waves-light">View More ...</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
