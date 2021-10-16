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
                <a href="{{ route('user.posts.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add New Post</a>
            </div>

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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>View Post</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ $post->title }}</td>
                                <td>
                                    {{ $post->author->name }}
                                </td>
                                <td>
                                    Published
                                </td>
                                <td>
                                    <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary btn-sm btn-rounded">View Details</a>
                                </td>
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
