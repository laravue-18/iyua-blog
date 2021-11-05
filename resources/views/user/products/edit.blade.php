@extends('layouts.master')

@section('title') Edit Product @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Edit Product  @endslot
        @slot('li_1')  @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('user.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Product Name</label>
                            <input name="name" type="text" class="form-control" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label>Style</label>
                            <input name="style" type="text" class="form-control" value="{{ $product->style }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="5">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="number" class="form-control" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category ? ($product->category->id == $category->id ? 'selected' : '' ) : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
                        <a href="{{ route('user.products.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')

@endsection
