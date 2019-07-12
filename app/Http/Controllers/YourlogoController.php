<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YourlogoController extends Controller
{
    public function home(){

        return view('yourlogo.home');
    }

    public function about(){

        return view('yourlogo.about');
    }
}
