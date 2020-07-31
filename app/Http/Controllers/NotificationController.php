<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function notifications()
    {
        return view('notifications.notifications');
    }
}
