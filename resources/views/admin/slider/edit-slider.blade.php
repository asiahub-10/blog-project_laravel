@extends('admin.master')

@section('title')
    Edit Slider
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body bg-gray-200">

                <h1 class="text-center text-info">{{ Session::get('message') }}</h1>

                <form action="{{ route('update-slider') }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3">Slider Image</label>
                        <div class="col-md-9">
                            <input type="file" name="slider_image" accept="image/*"/>
                            <hr/>
                            <img src="{{ asset($slider->slider_image) }}" alt="" height="100" width="120"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Slider Title</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="slider_title">{{ $slider->slider_title }}</textarea>
                            <input type="hidden" name="id" class="form-control" value="{{ $slider->id }}"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Slider Para</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="slider_para">{{ $slider->slider_para }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3">Publication Status</label>
                        <div class="col-md-9 radio">
                            <label class="mr-3"><input type="radio" {{ $slider->publication_status == 1 ? 'checked' : '' }} name="publication_status" class="mr-1" value="1"/>Published</label>
                            <label><input type="radio" {{ $slider->publication_status == 0 ? 'checked' : '' }} name="publication_status" class="mr-1" value="0"/>Unpublished</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <input type="submit" name="btn" class="btn btn-info btn-block form-control" value="Update Slider Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection