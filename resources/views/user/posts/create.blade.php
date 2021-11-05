@extends('layouts.master')

@section('title') Create New Post @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Create New Post  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
                <a href="{{ route('user.posts.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
            </form>
        </div>
    </div>


@endsection

@section('script')

@endsection
