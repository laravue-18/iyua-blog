@extends('layouts.master')

@section('title') Edit Category @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Edit Category  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.product-categories.update', $productCategory->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Category Name</label>
                    <input name="name" type="text" class="form-control" value="{{$productCategory->name}}">
                </div>

                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
                <a href="{{ route('user.product-categories.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
            </form>
        </div>
    </div>


@endsection
