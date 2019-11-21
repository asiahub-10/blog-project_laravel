@extends('admin.master')

@section('title')
    Edit Blog
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body bg-gray-200">

                <h1 class="text-center text-info">{{ Session::get('message') }}</h1>

                <form action="{{ route('update-blog') }}" method="post" enctype="multipart/form-data" name="editBlogForm">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Blog Title</label>
                        <div class="col-md-9">
                            <input type="text" name="blog_title" value="{{ $blog->blog_title }}" class="form-control" />
                            <input type="hidden" name="id" value="{{ $blog->id }}" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Blog Short Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="blog_short_description">{{ $blog->blog_short_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Blog Long Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="editor" name="blog_long_description">{{ $blog->blog_long_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Blog Image</label>
                        <div class="col-md-9">
                            <input type="file" name="blog_image" accept="image/*"/>
                            <hr/>
                            <img src="{{ asset($blog->blog_image) }}" alt="" height="100" width="120"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Publication Status</label>
                        <div class="col-md-9 radio">
                            <label class="mr-3"><input type="radio" {{ $blog->publication_status == 1 ? 'checked' : '' }} name="publication_status" class="mr-1" value="1"/>Published</label>
                            <label><input type="radio" {{ $blog->publication_status == 0 ? 'checked' : '' }} name="publication_status" class="mr-1" value="0"/>Unpublished</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <input type="submit" name="btn" class="btn btn-info btn-block form-control" value="Update Blog Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editBlogForm'].elements['category_id'].value = '{{ $blog->category_id }}';
    </script>
@endsection