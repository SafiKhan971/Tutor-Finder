<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;   
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8|same:confirm_password',
            'confirm_password'=>'required',
        ]);

        if($validator->passes()){
            $user = new User();
        
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        
            // Flash message to indicate successful registration
            session()->flash('success', 'You have registered successfully');
        
            // Return JSON response indicating success
            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }

    }

      //this is the user login
      public function login()
      {
            return view('front.account.login');
      }


      public function authenticate(Request $request)
      {
        $validator =Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=> 'required'
        ]);
        if($validator->passes())
        {
            if(Auth::attempt(['email'=>$request->email, 'password'=> $request->password]))
            {
                return redirect()->route('account.profile');

            }else{
                return redirect()->route('account.login')->with('error','Either Email/Password is incorrect');
            }

        }
        else{
            return redirect()->route('account.login')->withErrors($validator)->withInput($request->only('email'));
        }
      }



      public function profile()
      {
        $id= Auth::user()->id;
        
        $user =User::where('id',$id)->first();
        // dd($user);


        
        return view('front.account.profile',['user' => $user]);
      }

      public function updateProfile(Request $request)
{
    $id = Auth::user()->id;

    $validator = Validator::make($request->all(), [
        'name' => 'required|min:5|max:20',
        'email' => 'required|email|unique:users,email,'.$id.',id',
        // Fix the unique validation rule
    ]);

    if ($validator->passes()) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->designation = $request->designation;
        $user->save();
        return redirect()->route('account.profile',['id'=>$id]);
        // session()->flash('success', 'Update successfull');


        // return response()->json([
        //     'status' => true,
        //     'error' => []
        // ]);
        // return redirect()->route('contact.profile',['id'=>$id]); //pass 
    } else {

        // session()->flash('error', 'Enter  Valid Information');
        // Validation failed, return errors
        // return response()->json([
        //     'status' => false,
        //     'error' => $validator->errors()->toArray()
        // ]);
        return redirect()->back()->withErrors($validator)->withInput();
    }
}


      public function logout()
      {
          Auth::logout();
          return redirect()->route('account.login');
      }


      public function updateProfilePic(Request $request){
        // dd($request->all());
        $id = Auth::user()->id;

        $validator= Validator::make($request->all(),[
            'image'=> 'required|image'
        ]);

        if($validator->passes()){


            $image= $request->image;
            $ext= $image->getClientOriginalExtension();
            $imageName= $id.'-'.time().'.'.$ext;

            $image->move(public_path('/profile_pic'),$imageName);

            User::where('id',$id)->update(['image'=>$imageName]);

             session()->flash('success',"Profile picture updated successfully.");

            return response()->json([
                'status' => true,
                'errors' => []
            ]);



        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
      }



}
