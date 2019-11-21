@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('body')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <h3 class="text-info text-center">{{ Session::get('message') }}</h3>
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>SL NO</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php($i=1)
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->category_description }}</td>
                        <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            <a href="{{ route('edit-category', ['id'=>$category->id]) }}">Edit</a>
                            <a href="#" id="{{ $category->id }}" class="delete-btn" onclick="
                            event.preventDefault();
                            var check = confirm('Are you sure to delete this ???');
                            if (check) {
                                document.getElementById('deleteCategoryForm'+'{{ $category->id }}').submit();
                            }
                            ">Delete</a>
                            <form id="deleteCategoryForm{{ $category->id }}" action="{{ route('delete-category') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $category->id }}" name="id"/>
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