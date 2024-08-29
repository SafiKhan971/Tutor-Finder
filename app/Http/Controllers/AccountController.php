<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClassType;
use App\Models\SavedTution;
use App\Models\Tution;
use App\Models\TutionApplication;
use App\Models\User;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Psy\Command\WhereamiCommand;

class AccountController extends Controller
{
    //this is the user registration
    public function registration()
    {


        return view('front.account.registration');
    }

    //this method will save a user 
    public function processRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            // Flash message to indicate successful registration
            session()->flash('success', 'You have registered successfully');

            // Return JSON response indicating success
            // return response()->json([
            //     'status' => true,
            //     'errors' => []
            // ]);
            return redirect()->route('account.login');
        } else {
            // return response()->json([
            //     'status'=>false,
            //     'errors'=>$validator->errors()
            // ]);
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    //this is the user login
    public function login()
    {
        return view('front.account.login');
    }


    public function authenticate(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (auth()->user()->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif (auth()->user()->role == 'tutor') {
                    return redirect()->route('tutor.profile');
                } else {
                    return redirect()->route('account.profile');
                }
            } else {
                return redirect()->route('account.login')->with('error', 'Either Email/Password is incorrect');
            }
        } else {
            return redirect()->route('account.login')->withErrors($validator)->withInput($request->only('email'));
        }
    }



    public function profile()
    {
        $id = Auth::user()->id;

        $user = User::where('id', $id)->first();
        // dd($user);



        return view('front.account.profile', ['user' => $user]);
    }

    // public function updateProfile(Request $request)
    // {

    //      dd($request);
    //     $id = Auth::user()->id;

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|min:5|max:20',
    //         'email' => 'required|email|unique:users,email,'.$id.',id',
    //         // Fix the unique validation rule
    //     ]);

    //     if ($validator->passes()) {

    //         $user = User::find($id);
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->mobile = $request->mobile;
    //         $user->designation = $request->designation;
    //         $user->save();


    //         return redirect()->route('account.profile',['id'=>$id]);


    //         // session()->flash('success', 'Update successfull');


    //         // return response()->json([
    //         //     'status' => true,
    //         //     'error' => []
    //         // ]);
    //         // return redirect()->route('contact.profile',['id'=>$id]); //pass 
    //     } else {

    //         // session()->flash('error', 'Enter  Valid Information');
    //         // Validation failed, return errors
    //         // return response()->json([
    //         //     'status' => false,
    //         //     'error' => $validator->errors()->toArray()
    //         // ]);
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    // }

    public function updateProfile(Request $request)
    {
        // dd($request->name);
        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|max:20',
            'address' => 'nullable|max:200',
        ]);

        if ($validator->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->qualification = $request->qualification;
            $user->subjects = $request->subjects;
            $user->experiece = $request->experiece;
            $user->availability = $request->availability;
            $user->type = $request->type;
            $user->hourly_rate = $request->hourly_rate;
            $user->save();

            //dd($validator);
            if (auth()->user()->role == 'tutor') {
                return redirect()->route('tutor.profile');
            } else {
                return redirect()->route('account.profile', ['id' => $id]);
            }
        } else {

            return redirect()->back()->withErrors($validator)->withInput();
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }


    public function updateProfilePic(Request $request)
    {
        // dd($request->all());
        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);

        if ($validator->passes()) {

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = $id . '-' . time() . '.' . $ext;
            $image->move(public_path('/profile_pic'), $imageName);
            User::where('id', $id)->update(['image' => $imageName]);

            session()->flash('success', "Profile picture updated successfully.");

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function createTution()
    {

        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();

        $classType = ClassType::orderBy('id')->where('status', 1)->get();



        // return view('front.account.login'); 
        return view('front.account.tution.create', [
            'categories' => $categories,
            'jobTypes' => $classType,
        ]);
    }


    public function store(Request $request)
    {
        dd($request->all());

        $validator = Validator::make([
            'week_days' => 'required',
            'time' => 'required',
            'subject' => 'required',
            'duration' => 'required',
        ]);


        if ($validator->passes()) {
            $tution = new Tution();

            $tution->title = $request->title;
            $tution->category_id = $request->category;
            $tution->class_type_id = $request->jobType;
            $tution->user_id = Auth::user()->id;
            $tution->no_of_stu = $request->vacancy;
            $tution->salary = $request->salary;
            $tution->location = $request->location;
            $tution->description = $request->description;
            $tution->benefits = $request->benefits;
            $tution->responsibility = $request->responsibility;
            $tution->qualifications = $request->qualifications;
            $tution->experience = $request->experience;
            $tution->gurdian_name = $request->company_name;
            $tution->gurdian_location = $request->gurdian_location;
            $tution->gurdian_number = $request->contactnumber;

            $tution->save();


            // session()->flash('success','Tution added Successfully');
            // return response()->json([
            //     'status' => true,
            //     'errors' => []
            // ]);
            // return redirect()->route('account.login');
            // return view('front.account.tution.my-tution');
            return redirect()->route('account.myTution');
        } else {
            // return response()->json([
            //     'status' => false,
            //     'errors' => $validator->errors()
            // ]);
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function myTution()
    {
        $tutions = Tution::where('student_id', Auth::user()->id)
        ->with('tutor', 'subject')->orderBy('created_at', 'DESC')->paginate(10);

        // dd($tutions);
        return view('front.account.tution.my-tutions', [
            'tutions' => $tutions,
        ]);
    }

    public function editTution(Request $request, $id)
    {
        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();

        $classType = ClassType::orderBy('id')->where('status', 1)->get();


        $tution = Tution::where([
            'user_id' => Auth::user()->id,
            'id' => $id
        ])->first();

        if ($tution == null) {
            abort(404);
        }



        return view('front.account.tution.edit', [
            'categories' => $categories,
            'jobTypes' => $classType,
            'tution' => $tution
        ]);
    }



    public function updateJob(Request $request, $id)
    {
        // dd($id);
        // dd($request);
        $rules = [
            'title' => 'required|min:5|max:200',
            'category' => 'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            // 'location'=>  'required',

            'description' =>  'required',

            'company_name' =>  'required',
            'contactnumber' =>  'required|min:11|max:14',

        ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {
            $tution =  Tution::find($id);

            $tution->title = $request->title;
            $tution->category_id = $request->category;
            $tution->class_type_id = $request->jobType;
            $tution->user_id = Auth::user()->id;
            $tution->no_of_stu = $request->vacancy;
            $tution->salary = $request->salary;
            $tution->location = $request->location;
            $tution->description = $request->description;
            $tution->benefits = $request->benefits;
            $tution->responsibility = $request->responsibility;
            $tution->qualifications = $request->qualifications;
            $tution->experience = $request->experience;
            $tution->gurdian_name = $request->company_name;
            $tution->gurdian_location = $request->gurdian_location;
            $tution->gurdian_number = $request->contactnumber;

            $tution->save();


            // session()->flash('success','Tution Updated Successfully');
            // return response()->json([
            //     'status' => true,
            //     'errors' => []
            // ]);
            // return redirect()->route('account.login');
            // return view('front.account.tution.my-tution');
            return redirect()->route('account.myTution');
        } else {
            // return response()->json([
            //     'status' => false,
            //     'errors' => $validator->errors()
            // ]);
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function deleteTution(Request $request)
    {
        $tution = Tution::where([
            'user_id' => Auth::user()->id,
            'id' => $request->tutionId
        ])->first();

        if ($tution == null) {
            session()->flash('error', 'Either tution deleted or not found');
            return response()->json([
                'status' => true
            ]);
        }

        Tution::where('id', $request->tutionId)->delete();

        session()->flash('error', 'Tution deleted Successfully');
        return response()->json([
            'status' => true
        ]);
    }


    public function myTutionApplications()
    {

        $tutionApplications = TutionApplication::where('user_id', Auth::user()->id)->with('tution')->orderBy('created_at', 'DESC')->paginate(10);
        // dd($tutions);

        return view('front.account.tution.my-tution-applications', [
            'tutionApplications' => $tutionApplications
        ]);
    }


    public function removeTutions(Request $request)
    {
        $tution = TutionApplication::where([
            'user_id' => Auth::user()->id,
            'id' => $request->tutionId
        ])->first();
        if ($tution == null) {
            session()->flash('error', 'Either tution deleted or not found');
            return response()->json([
                'status' => true
            ]);
        }

        TutionApplication::where('id', $request->tutionId)->delete();

        session()->flash('error', 'Tution deleted Successfully');
        return response()->json([
            'status' => true
        ]);
    }



    // public function removeTutions(Request $request)
    // {
    //     // $tution= Tution::where([
    //     //     'user_id'=> Auth::user()->id,
    //     //     'id'=>$request->tutionId
    //     // ])->first();

    //     // if($tution==null){
    //     //     session()->flash('error','Either tution deleted or not found');
    //     //     return response()->json([
    //     //         'status'=>true
    //     //     ]);
    //     // }

    //     // Tution::where('id', $request->tutionId)->delete();

    //     // session()->flash('error','Tution deleted Successfully');
    //     // return response()->json([
    //     //     'status'=>true
    //     // ]);

    // //   $tutionAppliction= TutionApplication::where([
    // //         'id'=>$request->id,
    // //         'user_id'=>Auth::user()->id
    // //     ])->first();


    //     // if($tutionAppliction==null){

    //     //     session()->flash('error','Tution Application not found');

    //     //     return response()->json([
    //     //         'status'=>true
    //     //     ]);
    //     // }



    //     // TutionApplication::where('id', $request->tutionId)->delete();
    //     // session()->flash('success','Tution removed Successfully');

    //     // return response()->json([
    //     //     'status'=>true
    //     // ]);

    // }



    public function saveTutions()
    {
        // $tutionApplications= TutionApplication::where('user_id',Auth::user()->id)
        // ->with(['tution'])
        // ->paginate(10);
        // dd($tutions);

        $savedTutions = SavedTution::where([
            'user_id' => Auth::user()->id
        ])->with(['tution'])->orderBy('created_at', 'DESC')
            ->paginate(10);


        return view('front.account.tution.saved-tutions', [
            'savedTutions' => $savedTutions
        ]);
    }




    public function removeSavedJob(Request $request)
    {
        $savedTution = SavedTution::where([
            'id' => $request->id,
            'user_id' => Auth::user()->id
        ])->first();

        if (!$savedTution) {
            session()->flash('error', 'Tution not found');
            return response()->json([
                'status' => false
            ]);
        }

        $savedTution->delete();
        session()->flash('success', 'Tution removed successfully.');
        return response()->json([
            'status' => true
        ]);
    }



    // public function updatePassword(Request $request)
    // {
    //     //dd($request);
    //     $validator = Validator::make($request->all(),[
    //         'old_password' => 'required',
    //         'new_password' => 'required|min:5',
    //         'confirm_password' => 'required|same:new_password',
    //     ]);

    //     if($validator->fails()){
    //         return response()->json([
    //             'status' =>false,
    //             'errors'=>$validator->errors()
    //         ]);
    //     }

    //     if (Hash::check($request->old_password, Auth::user()->password) == false) {
    //         session()->flash('error', 'Your old password is incorrect.');

    //         return response()->json([
    //             'status' => false, // Indicate failure
    //             'error' => 'Your old password is incorrect.'
    //         ]);
    //     }


    //     $user =User::find(Auth::user()->id);
    //     $user->password=Hash::make($request->new_password);
    //     $user->save();

    //     session()->flash('success','Your password is updated.');

    //         return response()->json([
    //             'status'=>true,
    //         ]);



    //         // if($validator->passes())
    //         // {
    //         //     if(Auth::attempt(['email'=>$request->email, 'password'=> $request->password]))
    //         //     {
    //         //         return redirect()->route('account.profile');

    //         //     }else{
    //         //         return redirect()->route('account.login')->with('error','Either Email/Password is incorrect');
    //         //     }

    //         // }
    //         // else{
    //         //     return redirect()->route('account.login')->withErrors($validator)->withInput($request->only('email'));
    //         // }



    // }
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
            // return response()->json([
            //     'status' => false,
            //     'errors' => $validator->errors()
            // ]);
        }

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            session()->flash('error', 'Your old password is incorrect');
            return redirect()->back()->withErrors($validator)->withInput();
            // return response()->json([
            //     'status' => false, 
            //     'error' => 'Your old password is incorrect.'
            // ]);
        }

        // Update password
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('account.profile');

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Password updated successfully.'
        // ]);
    }
}
