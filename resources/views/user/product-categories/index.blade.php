@extends('layouts.master')

@section('title') Product Categories @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Product Categories  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="text-sm-right">
                <a href="{{ route('user.product-categories.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add New Category</a>
            </div>

            <div class="table-responsive">
                <table class="table table-centered table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('user.product-categories.edit', $category->id) }}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="javascript:void(0);"
                                       class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                       onclick="
                                           event.preventDefault();
                                           if(confirm('Really Delete?')){
                                                document.getElementById('row-delete-{{$category->id}}').submit();
                                           }"
                                    >
                                        <i class="mdi mdi-close font-size-18"></i>
                                        <form
                                            id="row-delete-{{$category->id}}"
                                            action="{{ route('user.product-categories.destroy', $category->id) }}" method="POST"
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
