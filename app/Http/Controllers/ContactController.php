<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index()
    {
        $data['contacts'] = Contact::paginate(10);
        return view('admin.contact-messages.index', $data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required|max:200',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        session()->flash('success', 'Message Sent Successfully !!!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Contact::where('id', $id)->delete();

        session()->flash('success','Contact Message Deleted Successfully !!!');
        return redirect()->route('contact.index');
    }


    public function deleteAll()
    {
        Contact::truncate();

        session()->flash('success','Contact Messages Deleted Successfully !!!');
        return redirect()->route('contact.index');
    }


}
