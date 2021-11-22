@extends('home.layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-5 text-uppercase">Blog Posts</h1>
        <div class="row">
            <div class="col-md-7">
                @foreach($posts as $post)
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                <img class="card-img img-fluid" src="{{ asset('/images/' . $post->image ) }}" alt="Card image">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text text-truncate">{{ $post->description }}</p>
                            {{--                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-secondary waves-effect waves-light">View More ...</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="col-md-5">
                <x-blog-categories-list></x-blog-categories-list>
            </div>
        </div>


    </div>
@endsection
