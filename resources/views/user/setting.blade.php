@extends('layouts.master')

@section('title') Setting @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Setting  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <h5>Store</h5>
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Store Name</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Store Email</label>
                            <input name="email" type="email" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
                        <a href="" class="btn btn-secondary waves-effect">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
