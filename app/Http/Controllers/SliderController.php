<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slider;

class SliderController extends Controller
{
    public function addSlider() {
        return view('admin.slider.add-slider');
    }

    public function newSlider(Request $request) {
        Slider::saveSliderInfo($request);
        return redirect('/slider/add-slider')->with('message', 'Slider info save successfully');
    }

    public function manageSlider() {
        $sliders = DB::table('sliders')
                        ->select('sliders.*')
                        ->get();

        return view('admin.slider.manage-slider', [
            'sliders'   =>  $sliders
        ]);
    }

    public function editSlider($id) {
        $slider = Slider::find($id);
        return view('admin.slider.edit-slider', [
            'slider'    =>  $slider
        ]);
    }

    public function updateSlider(Request $request) {
        Slider::updateSliderInfo($request);
        return redirect('/slider/manage-slider')->with('message', 'Slider info update successfully');
    }

    public function deleteSlider(Request $request) {
        $slider = Slider::find($request->id);
        unlink($slider->slider_image);
        $slider->delete();

        return redirect('/slider/manage-slider')->with('message', 'Slider info delete successfully');
    }
}















