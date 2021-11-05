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
                            <th>OrderID</th>
                            <th>Buyer</th>
                            <th>Product</th>
                            <th>Payer Email</th>
                            <th>Shipping Address</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->product ? $order->product->name : 'Deleted' }}</td>
                                <td>{{ $order->payer_email }}</td>
                                <td>{{ $order->shipping_address }}</td>
                                <td>$ {{ $order->amount }}</td>
                                <td>{{ $order->created_at }}</td>
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
