@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Dashboard  @endslot
        @slot('li_1')  @endslot
    @endcomponent

@endsection

@section('script')

@endsection
