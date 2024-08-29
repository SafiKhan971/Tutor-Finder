<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tution;
use App\Models\Category;
use App\Models\Discipline;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   //This method will show our homepage

   public function index()
   {
      $data['disciplines'] = Discipline::all();
      $data['subjects'] = Subject::with('discipline')->take(8)->get();
      $data['tutors'] = User::where('role', 'tutor')
         
         ->where('status', 1)
         ->withAvg('rating','rating')
         ->take(8)->get();

      return view('front.home', $data);
   }

   public function contact()
   {
      return view('front.contact');
   }

   public function about_us()
   {
      return view('front.about-us');
   }

   public function faqs()
   {
      return view('front.faqs');
   }
}
