<?php

namespace App\Http\Controllers;

use DateTime;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Tution;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Enter Your Stripe Secret
        Stripe::setApiKey('sk_test_51MHsIGFZfZzdLS0xdRq75XlJJHYkySgsM9EKMm3auGjRx2j8YTSFF6DpncIulbKPX0K1MU6EAqmPsLEWoAMhxcbG00KpC9zzlz');


        $tution = Tution::latest()->first();
        // total days per week
        $daysPerWeek = $tution->week_days;
        $days = explode(',', $daysPerWeek);
        $numDays = count($days);

        // total hours per session
        $start = DateTime::createFromFormat('H:i:s', trim($tution->start_time));
        $end = DateTime::createFromFormat('H:i:s', trim($tution->end_time));
        $sessionDuration = $end->diff($start);
        
        $hoursPerSession = $sessionDuration->h + $sessionDuration->i / 60;
        if($hoursPerSession < 1){
            $hoursPerSession = 1;
        }

        // total duration / weeks
        $duration = $tution->duration;


        // Calculate total hours
        $totalHours = $numDays * $hoursPerSession * $duration;
        

        // tutor
        $tutor = User::where('id', $tution->tuter_id)->first();
        $student = User::where('id', $tution->student_id)->first();

        $amount = $totalHours * $tutor->hourly_rate;


        $payment_intent = PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount*100,
            'currency' => 'USD',
            'description' => $tution->title,
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        
        return view('checkout.credit-card', compact('intent', 'amount'));
    }

    public function afterPayment()
    {
        $tution = Tution::latest()->first();
        Tution::where('id', $tution->id)->update(['status' => 1]);
        session()->flash('success', 'Payment Received, Tutor Hired Successfully !!!');
        return redirect()->route('account.myTution');
    }
}
