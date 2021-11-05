@extends('layouts.master')

@section('title') Posts @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Posts  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="text-sm-right">
                <a href="{{ route('user.products.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add New Product</a>
            </div>

            <div class="table-responsive">
                <table class="table table-centered table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/' . $product->image) }}" alt="" height="60">
                                </td>
                                <td> {{ $product->name }} </td>
                                <td> $ {{ $product->price }} </td>
                                <td> {{ $product->category? $product->category->name : 'Uncategorized' }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm btn-rounded">View Details</a>
                                </td>
                                <td>
                                    <a href="{{ route('user.products.edit', $product->id) }}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="javascript:void(0);"
                                       class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                       onclick="
                                           event.preventDefault();
                                           if(confirm('Really Delete?')){
                                           document.getElementById('row-delete-{{$product->id}}').submit();
                                           }"
                                    >
                                        <i class="mdi mdi-close font-size-18"></i>
                                        <form
                                            id="row-delete-{{$product->id}}"
                                            action="{{ route('user.products.destroy', $product->id) }}" method="POST"
                                            style="display: none;"
                                        >
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </a>
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
