<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyMaterialController extends Controller
{
    public function study_materials() {
        return view('front.study-materials');
    }
}
