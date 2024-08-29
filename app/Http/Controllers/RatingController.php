<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
            'review' => 'required|max:200',
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // dd($request->all());

        Rating::create([
            'tuter_id' => $request->tutor_id,
            'student_id' => Auth::id(),
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->back();
    }
}
