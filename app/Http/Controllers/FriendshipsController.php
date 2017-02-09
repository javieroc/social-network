<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function check($id)
    {
        if(Auth::user()->is_friends_with($id))
        {
            return ['status' => 'friends'];
        }

        if(Auth::user()->has_pending_friend_request_from($id))
        {
            return ['status' => 'pending'];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id))
        {
            return ['status' => 'waiting'];
        }

        if(Auth::user()->id == $id)
        {
            return ['status' => 'myself'];
        }

        return ['status' => 0];
    }

    public function add_friend($id)
    {
        // Sending notifications, emails...
        return Auth::user()->add_friend($id);
    }

    public function accept_friend($id)
    {
        // Sending notifications, emails...
        return Auth::user()->accept_friend($id);
    }
}
