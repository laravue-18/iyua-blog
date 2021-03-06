@extends('layouts.master')

@section('title') Create New Category @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Create New Category  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Category Name</label>
                    <input name="name" type="text" class="form-control" value="{{$category->name}}">
                </div>

                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
                <a href="{{ route('user.categories.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
            </form>
        </div>
    </div>


@endsection
