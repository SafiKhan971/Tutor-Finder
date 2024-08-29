<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'user')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.users.list', [
            'users' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request, $id)
    { 
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'phone' => 'nullable|max:20',
            'address' => 'nullable|max:200',
        ]);

        if ($validator->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
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
        $id = $request->id;

        $user = User::findOrFail($id);

        if ($user == null) {
            session()->flash('error', 'User not found');
            return response()->json([
                'status' => false,
            ]);
        }

        $user->delete();
        session()->flash('success', 'User deleted successfully');
        return response()->json([
            'status' => true,
        ]);
    }
}
