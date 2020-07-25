<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Product;
use App\Question;
use App\Task;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function done($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.done', [
            'user' => $user,
            'type' => 'user.done',
            'done_count' => Task::where([['user_id', $user->id], ['done', true]])->count(),
            'pending_count' => Task::where([['user_id', $user->id], ['done', false]])->count(),
            'product_count' => Product::where('user_id', $user->id)->count(),
            'question_count' => Question::where('user_id', $user->id)->count(),
            'answer_count' => Answer::where('user_id', $user->id)->count(),
        ]);
    }

    public function pending($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.pending', [
            'user' => $user,
            'type' => 'user.pending',
            'done_count' => Task::where([['user_id', $user->id], ['done', true]])->count(),
            'pending_count' => Task::where([['user_id', $user->id], ['done', false]])->count(),
            'product_count' => Product::where('user_id', $user->id)->count(),
            'question_count' => Question::where('user_id', $user->id)->count(),
            'answer_count' => Answer::where('user_id', $user->id)->count(),
        ]);
    }

    public function products($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.products', [
            'user' => $user,
            'done_count' => Task::where([['user_id', $user->id], ['done', true]])->count(),
            'pending_count' => Task::where([['user_id', $user->id], ['done', false]])->count(),
            'product_count' => Product::where('user_id', $user->id)->count(),
            'question_count' => Question::where('user_id', $user->id)->count(),
            'answer_count' => Answer::where('user_id', $user->id)->count(),
        ]);
    }

    public function following($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.following', [
            'user' => $user,
            'done_count' => Task::where([['user_id', $user->id], ['done', true]])->count(),
            'pending_count' => Task::where([['user_id', $user->id], ['done', false]])->count(),
            'product_count' => Product::where('user_id', $user->id)->count(),
            'question_count' => Question::where('user_id', $user->id)->count(),
            'answer_count' => Answer::where('user_id', $user->id)->count(),
        ]);
    }

    public function followers($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.followers', [
            'user' => $user,
            'done_count' => Task::where([['user_id', $user->id], ['done', true]])->count(),
            'pending_count' => Task::where([['user_id', $user->id], ['done', false]])->count(),
            'product_count' => Product::where('user_id', $user->id)->count(),
            'question_count' => Question::where('user_id', $user->id)->count(),
            'answer_count' => Answer::where('user_id', $user->id)->count(),
        ]);
    }

    public function profileSettings()
    {
        $user = Auth::user();

        return view('user.settings.profile', [
            'user' => $user,
        ]);
    }

    public function accountSettings()
    {
        $user = Auth::user();

        return view('user.settings.account', [
            'user' => $user,
        ]);
    }

    public function passwordSettings()
    {
        $user = Auth::user();

        return view('user.settings.password', [
            'user' => $user,
        ]);
    }

    public function deleteSettings()
    {
        $user = Auth::user();

        return view('user.settings.delete', [
            'user' => $user,
        ]);
    }

    public function darkMode()
    {
        $user = Auth::user();
        if (Auth::check()) {
            if ($user->isPatron) {
                if ($user->darkMode) {
                    $user->darkMode = false;
                    $user->save();

                    return 'disabled';
                } else {
                    $user->darkMode = true;
                    $user->save();

                    return 'enabled';
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
