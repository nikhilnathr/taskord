<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AdminBarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function toggle()
    {
        $user = Auth::user();
        if ($user->isStaff) {
            if ($user->staffShip) {
                $user->staffShip = false;
                $user->save();

                return 'disabled';
            } else {
                $user->staffShip = true;
                $user->save();

                return 'enabled';
            }
        } else {
            return false;
        }
    }
}
