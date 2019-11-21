@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('body')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
{{--            <h1 class="m-0 font-weight-bold text-warning">{{ $name }}</h1>--}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <h3 class="text-info text-center">{{ Session::get('message') }}</h3>
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Category Name</th>
                        <th>Blog Title</th>
                        <th>Blog Image</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>SL NO</th>
                        <th>Category Name</th>
                        <th>Blog Title</th>
                        <th>Blog Image</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php($i=1)
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $blog->category_name }}</td>
                            <td>{{ $blog->blog_title }}</td>
                            <td><img src="{{ asset($blog->blog_image) }}" alt="" height="100" width="120"/></td>
                            <td>{{ $blog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{ route('edit-blog', ['id'=>$blog->id]) }}">Edit</a>
                                <a href="#" id="{{ $blog->id }}" class="delete-btn" onclick="
                                        event.preventDefault();
                                        var check = confirm('Are you sure to delete this ???');
                                        if (check) {
                                        document.getElementById('deleteBlogForm'+'{{ $blog->id }}').submit();
                                        }
                                        ">Delete</a>
                                <form id="deleteBlogForm{{ $blog->id }}" action="{{ route('delete-blog') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $blog->id }}" name="id"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection