<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index()
    {
        $senderIds = Message::where('from_user', '!=', auth()->user()->id)
        ->where('to_user', auth()->user()->id)
        ->distinct()->pluck('from_user');
        $senders = User::whereIn('id', $senderIds)->paginate(10);
        $data['senders'] = $senders;
        return view('messages.index', $data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'message' => 'required|max:200',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        
        Message::create([
            'from_user' => Auth::id(),
            'to_user' => $request->tutor_id,
            'message' => $request->message,
            'status' => 0,
        ]);

        session()->flash('success', 'Message Sent Successfully !!!');
        return redirect()->back();
    }

    public function reply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|max:200',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $student = User::where('id', $request->student_id)->first();
        $user = Auth::user();
        $data = [
            'user_id' => $user->id,
            'message' => $request->message,
            'user_name' => $user->name,
            'user_email' => $user->email,
        ];

        $student->notify(new MessageNotification($data));

        session()->flash('success', 'Message Sent Successfully !!!');
        return redirect()->back();
    }


    public function show($id)
    {
        $currentUserId = auth()->user()->id;
        
        // Fetch messages where the current user is either the sender or the receiver
        $data['messages'] = Message::where(function ($query) use ($id, $currentUserId) {
                $query->where('from_user', $currentUserId)
                      ->where('to_user', $id);
            })
            ->orWhere(function ($query) use ($id, $currentUserId) {
                $query->where('from_user', $id)
                      ->where('to_user', $currentUserId);
            })
            ->orderBy('created_at', 'ASC')
            ->get();
        
            $data['sender_id'] = $id;
            $data['sender_name'] = User::where('id', $id)->pluck('name')->first();
            // dd($data['sender_name']);
        return view('messages.show', $data);
    }


    public function mark_as_read($id)
    {
        Message::where('from_user', $id)->update([
            'status' => 1
        ]);  
        session()->flash('success', 'Message Marked Successfully !!!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Message::where('from_user', $id)->delete();
           
        session()->flash('success', 'Conversation Deleted Successfully !!!');
        return redirect()->back();
    }
    
}
