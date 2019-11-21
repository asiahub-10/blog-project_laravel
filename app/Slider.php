<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model
{
    protected $fillable = ['slider_image', 'slider_title', 'slider_para', 'publication_status'];

    public static function saveSliderInfo($request) {
        $sliderImage = $request->file('slider_image');

        $imageName = $sliderImage->getClientOriginalName();
        $directory = './slider-images/';
        $sliderImage->move($directory, $imageName);

        $slider = new Slider();
        $slider->slider_image       = $directory.$imageName;
        $slider->slider_title       = $request->slider_title;
        $slider->slider_para        = $request->slider_para;
        $slider->publication_status = $request->publication_status;
        $slider->save();
    }

    public static function updateSliderInfo($request) {
        $slider = Slider::find($request->id);
        $sliderImage = $request->file('slider_image');

        if ($sliderImage) {
            //*****to remove slider image*****
            unlink($slider->slider_image);

            //*****to upload new slider image*****
            $imageName = $sliderImage->getClientOriginalName();
            $directory = './slider-images/';
            $sliderImage->move($directory, $imageName);

            //*****to update new slider info*****
            $slider->slider_image           = $directory.$imageName;
        }

        $slider->slider_title       = $request->slider_title;
        $slider->slider_para        = $request->slider_para;
        $slider->publication_status = $request->publication_status;
        $slider->save();
    }
}













