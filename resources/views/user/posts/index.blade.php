@extends('layouts.master')

@section('title') Posts @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Blog Posts  @endslot
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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>View Post</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>
                                    {{ $post->author->name }}
                                </td>
                                <td>{{ $post->category ? $post->category->name : 'Uncategoriezed' }}</td>
                                <td>
                                    Published
                                </td>
                                <td>
                                    <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary btn-sm btn-rounded">View Details</a>
                                </td>
                                <td>
                                    <a href="{{ route('user.posts.edit', $post->id) }}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="javascript:void(0);"
                                       class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                       onclick="
                                           event.preventDefault();
                                           if(confirm('Really Delete?')){
                                           document.getElementById('row-delete-{{$post->id}}').submit();
                                           }"
                                    >
                                        <i class="mdi mdi-close font-size-18"></i>
                                        <form
                                            id="row-delete-{{$post->id}}"
                                            action="{{ route('user.posts.destroy', $post->id) }}" method="POST"
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
