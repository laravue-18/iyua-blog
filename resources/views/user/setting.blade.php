@extends('layouts.master')

@section('title') Setting @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Setting  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Store</h5>
                    <form action="" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label>Store Name</label>
                            <input name="store_name" type="text" class="form-control" value="{{ $core_config['store_name'] }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="store_description" class="form-control" rows="5">{{ $core_config['store_description'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Store Email</label>
                            <input name="store_business_account" type="email" class="form-control" value="{{ $core_config['store_business_account'] }}">
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
