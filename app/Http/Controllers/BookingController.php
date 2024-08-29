<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Notifications\NewBookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $booking = Booking::create([
            'tutor_id' => $request->tutor_id,
            'student_id' => Auth::id(),
            'date' => $request->date,
            'time' => $request->time,
        ]);

        
        $user = User::where('id', $request->tutor_id)->first();
        $data = [
            'message' => 'New Booking has been placed',
            'user_name' => $user->name,
            'user_email' => $user->email,
        ];
        $user->notify(new NewBookingNotification($data));

        session()->flash('success','Demo Class Booked Successfully !!!');
        return redirect()->back();
    }

    public function index()
    {
        $data['bookings'] = Booking::with('student', 'tutor')->paginate(10);
        // dd($data['bookings']->toArray());
        return view('admin.booking.index', $data);
    }

    public function bookings()
    {
        $data['bookings'] = Booking::where('tutor_id', Auth::id())->with('student')->paginate(10);
        return view('tutor.bookings', $data);
    }

}
