@extends('layouts.master')

@section('title') Create New Category @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Create New Category  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.product-categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Category Name</label>
                    <input name="name" type="text" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
                <a href="{{ route('user.product-categories.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
            </form>
        </div>
    </div>


@endsection

@section('script')

@endsection
