<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function notifications()
    {
        //get all notifications
        // $notifications = auth()->user()->notifications()->paginate(10);

        //mark all as read
        auth()->user()->unreadNotifications->markAsRead();

        return view('users.notifications', [
            "notifications" => auth()->user()->unreadNotifications
        ]);
    }
}
