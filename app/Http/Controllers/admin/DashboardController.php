<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Discipline;
use App\Models\Subject;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $data['users'] = User::where('role', 'user')->count();
        $data['total_tutors'] = User::where('role', 'tutor')->count();
        $data['pending_tutors'] = User::where('role', 'tutor')->where('status', '0')->count();
        $data['approved_tutors'] = User::where('role', 'tutor')->where('status', '1')->count();
        $data['not_approved_tutors'] = User::where('role', 'tutor')->where('status', '2')->count();
        $data['disciplines'] = Discipline::count();
        $data['subjects'] = Subject::count();
        $data['bookings'] = Booking::count();
        $data['messages'] = Contact::count();
        return view('admin.dashboard', $data);
    }

}
