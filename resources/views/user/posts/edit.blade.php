@extends('layouts.master')

@section('title') Edit Post @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Edit Post  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category ? ($category->id == $post->category->id ? 'selected' : '') : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
                <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>
            </form>
        </div>
    </div>


@endsection

@section('script')

@endsection
