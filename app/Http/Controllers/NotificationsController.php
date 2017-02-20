<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function notifications()
    {
        Auth::user()->unreadNotifications->markAsRead();

        $notifications = Auth::user()->notifications;
        foreach ($notifications as $notification) {
            $notification->notificater = User::where('slug', str_slug($notification->data['name']))->first();
        }

        return view('notifications.notifications')->with('notifications', $notifications);
    }
}
