<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tution;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //This method will show our homepage
    
    public function index()
    {
      // echo 'kvmfk';

      $categories= Category::where('status',1)->orderBy('name','ASC')->take(8)->get();


       
      $featuredTutions= Tution::where('status',1)->orderBy('created_at','DESC')->with('classType')->where('isFeatured',1)->take(6)->get();


       
      $latestTutions= Tution::where('status',1)->with('classType')->orderBy('created_at','DESC')->take(6)->get();



       return view('front.home',[
         'categories'=> $categories,
         'featuredTutions'=>$featuredTutions,
         'latestTutions'=>$latestTutions
       ]);
    }

    public function contact()
    {
       return view('front.contact');
    }
}
