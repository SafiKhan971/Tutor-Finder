<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //This method will show our homepage
    
    public function index()
    {
       return view('front.home');
    }

    public function contact()
    {
       return view('front.contact');
    }
}
