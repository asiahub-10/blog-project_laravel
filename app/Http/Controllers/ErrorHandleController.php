<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandleController extends Controller
{
    public function error404() {
        return view('error.404');
    }

    public function error405() {
        return view('error.405');
    }
}
