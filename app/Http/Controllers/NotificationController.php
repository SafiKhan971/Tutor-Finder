<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = DatabaseNotification::where('notifiable_id', auth()->id())
            ->where('type', 'App\Notifications\NewBookingNotification')->whereNull('read_at')
            ->paginate(10);

        $data['notifications'] = $notifications;
        return view('notifications.index', $data);
    }

    public function markAsRead($id)
    {
        if ($id) {
            $notification = auth()->user()->notifications()->find($id);
            if ($notification) {
                $notification->markAsRead();
            }
            return back();
        }
    }

    public function markAllAsRead()
    {
        $notification = auth()->user()->notifications();
        $notification->markAsRead();
        return back();
    }

    public function clearAll()
    {
        $user = Auth::user();
        $user->notifications()->delete();

        return back()->with('success', 'All Notifications cleared successfully');
    }
}
