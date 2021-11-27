@extends('layouts.master')

@section('title') Orders @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Orders  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Shipping Address</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->address1 }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>{{ $order->created_at }}</td>
                                <th>{{ $order->status }}</th>
                                <td></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
