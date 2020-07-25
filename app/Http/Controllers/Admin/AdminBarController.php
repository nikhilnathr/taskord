<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class AdminBarController extends Controller
{
    public static function toggle()
    {
        $user = Auth::user();
        if ($user->staffShip) {
            $user->staffShip = false;
            $user->save();

            return 'disabled';
        } else {
            $user->staffShip = true;
            $user->save();

            return 'enabled';
        }
    }
}
