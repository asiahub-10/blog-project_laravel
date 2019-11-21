<?php

namespace App\Http\Controllers;

use App\Category;
use App\Visitor;
use Illuminate\Http\Request;
use Session;

class SignUpController extends Controller
{
    public function index() {
        return view('front.user.sign-up', [
            'categories'    =>  Category::where('publication_status', 1)->get()
        ]);
    }

    public function newSignUp(Request $request) {
        Visitor::saveVisitorInfo($request);
        return redirect('/');
    }

    public function visitorLogout(Request $request) {
        Session::forget('visitorId');
        Session::forget('visitorName');

        return redirect('/');
    }

    public function visitorLogin() {
        return view('front.user.sign-in', [
            'categories'    =>  Category::where('publication_status', 1)->get()
        ]);
    }

    public function visitorSignIn(Request $request) {
        $visitor = Visitor::where('email_address', $request->email_address)->first();

        if ($visitor) {
            if (password_verify($request->password, $visitor->password)) {

                Session::put('visitorId', $visitor->id);
                Session::put('visitorName', $visitor->first_name.' '.$visitor->last_name);

                return redirect('/');
            } else {
               return redirect('/visitor-login')->with('message', 'Password is not valid');
            }
        } else {
            return redirect('/visitor-login')->with('message', 'Email address is not valid');
        }
    }

    //********* this is for raw ajax********
    /*
    public function emailCheck($email) {
//        echo $email;

        $visitor = Visitor::where('email_address', $email)->first();
        if ($visitor) {
            echo 'Email address exits';
        } else {
            echo 'Email address available';
        }
    }
    */


    //********* this is for jquery ajax********

    public function emailCheck($email) {

        $visitor = Visitor::where('email_address', $email)->first();
        if ($visitor) {
            return json_encode('Email address exits');          //json_encode means convert to json & json_decode means convert from json to object or array
        } else {
            return json_encode('Email address available');
        }
    }
}
















