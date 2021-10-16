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
                    <label>Title</label>
                    <input name="title" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
                <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>
            </form>
        </div>
    </div>


@endsection

@section('script')

@endsection
