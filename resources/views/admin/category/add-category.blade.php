@extends('admin.master')

@section('title')
    Add Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body bg-gray-200">

                <h1 class="text-center text-info">{{ Session::get('message') }}</h1>
                {{--<h1 class="text-center text-warning">{{ $name }}</h1>--}}

                <form action="{{ route('new-category') }}" method="post" class="">
{{--                <form action="{{ url('/category/new-category') }}" method="post" class="">--}}
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <input type="text" name="category_name" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Category Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="category_description"></textarea>
                            <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : ' ' }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Publication Status</label>
                        <div class="col-md-9 radio">
                            <label class="mr-3"><input type="radio" name="publication_status" class="mr-1" value="1"/>Published</label>
                            <label><input type="radio" name="publication_status" class="mr-1" value="0"/>Unpublished</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <input type="submit" name="btn" class="btn btn-info btn-block form-control" value="Save Category Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection