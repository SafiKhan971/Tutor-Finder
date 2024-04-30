<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    //
    public function index()
    {
        $user =User::orderBy('created_at','DESC')->paginate(10);
        return view('admin.users.list',[
            'users'=> $user
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit',[
            'user'=>$user
        ]);
    }

    public function updateProfile(Request $request)
    {
        //dd($request->name);
        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
           // 'email' => 'required|email|unique:users,email,'.$id,
            // Fixed the unique validation rule
        ]);

        if ($validator->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;
            $user->save();

            //dd($validator);

            return redirect()->route('admin.users');

        } else {

           // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $id= $request->id;

        $user =User::findOrFail($id);

        if($user==null)
        {
            session()->flash('error','User not found');
            return response()->json([
                'status'=>false,
            ]);
        }

        $user->delete();
        session()->flash('success','User deleted successfully');
        return response()->json([
            'status'=>true,
        ]);

    }


}
