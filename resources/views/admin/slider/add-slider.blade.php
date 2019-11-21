@extends('admin.master')

@section('title')
    Add Slider
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body bg-gray-200">

                <h1 class="text-center text-info">{{ Session::get('message') }}</h1>

                <form action="{{ route('new-slider') }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3">Slider Image</label>
                        <div class="col-md-9">
                            <input type="file" name="slider_image" accept="image/*"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Slider Title</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="slider_title"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Slider Para</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="slider_para"></textarea>
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
                            <input type="submit" name="btn" class="btn btn-info btn-block form-control" value="Save Slider Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection