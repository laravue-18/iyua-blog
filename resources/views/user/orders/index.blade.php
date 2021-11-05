@extends('layouts.master')

@section('title') Posts @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Posts  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 20px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                </div>
                            </th>
                            <th>OrderID</th>
                            <th>Buyer</th>
                            <th>Product</th>
                            <th>Payer Email</th>
                            <th>Shipping Address</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->product ? $order->product->name : 'Deleted' }}</td>
                                <td>{{ $order->payer_email }}</td>
                                <td>{{ $order->shipping_address }}</td>
                                <td>$ {{ $order->amount }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="javascript:void(0);" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-size-18"></i></a>
                                </td>
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
