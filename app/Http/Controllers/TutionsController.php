<?php

namespace App\Http\Controllers;

use App\Mail\TutionNotificationEmail;
use App\Models\Category;
use App\Models\ClassType;
use App\Models\SavedTution;
use App\Models\Tution;
use App\Models\TutionApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\TuitionApplication;

class TutionsController extends Controller
{
    //This method will show tution page

    public function index(){

        // dd($response);
    
        $categories = Category::where('status',1)->get();
        $classTypes = ClassType::where('status',1)->get();


        $tutions= Tution::where('status',1)->with('category')->orderBy('created_at','DESC')->paginate(9);

        return view('front.tutions',[
            'categories'=>$categories,
            'classTypes'=> $classTypes,
            'tutions'=> $tutions
        ]);

    }


    public function detail($id)
    {

        $tution = Tution::where(['id'=>$id, 'status'=>1])->with(['category','classType'])->first();

        // dd($tution);

        // if($tution== null)
        // {
        //     abort(404);
        // }
        
        $count=0;
        if(Auth::user())
        {
            $count= SavedTution::where([
                'user_id'=>Auth::user()->id,
                'tution_id'=>$id
            ])->count();
    
        }

        $applicants= TutionApplication::where('tution_id',$id)->with('user')->get();
        // dd($applications);

        return view('front.tutionDetail',[
            'tution'=>$tution,
            'count'=>$count,
            'applicants'=> $applicants
        ]);
    }



    public function applyTution(Request $request)
    {
        $id = $request->id;
        $tution = Tution::where('id',$id)->first();

        if($tution==null)
        {
            session()->flash('error','Tution does not exists');
            return response()->json([
                'status'=>false,
                'message'=> 'Tution Does Not exists'
            ]);

        }
        //You can't applied twice

        $tutionApplicationCount = TutionApplication::where([
            'user_id'=>Auth::user()->id,
            'tution_id' =>$id
        ])->count();

        if($tutionApplicationCount>0)
        {




            
            session()->flash('error','You already applied this job');
            return response()->json([
                'status'=>false,
                'message'=> 'You already applied this job'
            ]);


        }

        //you can not apply in you own tution;

        $tutor_id = $tution->user_id;
        if($tutor_id==Auth::user()->id){
            session()->flash('error','You can not apply your own tution');
            return response()->json([
                'status'=>false,
                'message'=> 'You can not apply your own tution'
            ]);


        }


        $application =new TutionApplication();
        $application->tution_id =$id;
        $application->user_id =Auth::user()->id;
        $application->tutor_id =$tutor_id;
        
        $application->applied_date =now();

        $application->save();

        $tutor = User::where('id', $tutor_id)->first(); // Assuming you expect only one tutor
        $mailData = [
            'tutor' => $tutor,
            'user' => Auth::user(),
            'tution' => $tution
        ];

        dd($tutor);

            Mail::to($tutor->email)->send(new TutionNotificationEmail($mailData));

        //send notification email to tutor




        session()->flash('success', 'You have successfully applied');

        return response()->json([
            'status'=>true,
            'message'=> 'You have successfully applied '
        ]);

          



    }

//     public function applyTution(Request $request)
// {
//     $id = $request->id;
//     $tuition = Tution::where('id', $id)->first();

//     if ($tuition === null) {
//         session()->flash('error', 'Tuition does not exist');
//         return response()->json([
//             'status' => false,
//             'message' => 'Tuition does not exist'
//         ]);
//     }

//     // Check if the user has already applied for this tuition
//             $tutionApplicationCount = TutionApplication::where([
//             'user_id'=>Auth::user()->id,
//             'tution_id' =>$id
//         ])->count();

//     if ($tutionApplicationCount > 0) {
//         session()->flash('error', 'You have already applied for this tuition');
//         return response()->json([
//             'status' => false,
//             'message' => 'You have already applied for this tuition'
//         ]);
//     }

//     // Check if the user is trying to apply for their own tuition
//     $tutor_id = $tuition->user_id;
//     if ($tutor_id === Auth::user()->id) {
//         session()->flash('error', 'You cannot apply for your own tuition');
//         return response()->json([
//             'status' => false,
//             'message' => 'You cannot apply for your own tuition'
//         ]);
//     }

//     // Create a new application
//     $application = new TutionApplication();
//     $application->tuition_id = $id;
//     $application->user_id = Auth::user()->id;
//     $application->tutor_id = $tutor_id;
//     $application->applied_date = now();
//     $application->save();

//     // Send notification email to the tutor
//     $tutor = User::where('id', $tutor_id)->first(); // Assuming you expect only one tutor
//     $mailData = [
//         'tutor' => $tutor,
//         'user' => Auth::user(),
//         'tuition' => $tuition
//     ];

//     // Use Mail facade to send the email
//     Mail::to($tutor->email)->send(new TutionNotificationEmail($mailData));

//     session()->flash('success', 'You have successfully applied');

//     return response()->json([
//         'status' => true,
//         'message' => 'You have successfully applied'
//     ]);
// }


    public function saveTution(Request $request)
    {
        $id =$request->id;
        
        $tution= Tution::find($id);
        if($tution==null)
        {
            session()->flash('error','Tution Not Found');
            return response()->json([
                'status'=>false,
            ]);

        }

        //Check if user alerady saved the tution

        $count= SavedTution::where([
            'user_id'=>Auth::user()->id,
            'tution_id'=>$id
        ])->count();

        if($count>0)
        {
            session()->flash('error','You already saved the tution');
            return response()->json([
                'status'=>false,
            ]);


        }

        $savedTution= new SavedTution;

        $savedTution->tution_id=$id;
        $savedTution->user_id=Auth::user()->id;
        $savedTution->save();

        session()->flash('succeess','You have successfully saved the tution');
        return response()->json([
            'status'=>true,
        ]);







    }



}
