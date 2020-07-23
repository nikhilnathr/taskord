<?php

namespace App\Http\Livewire\User;

use App\User;
use Auth;
use Livewire\Component;

class Moderator extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function enrollBeta()
    {
        if (Auth::check() && Auth::user()->isStaff) {
            $this->user->isBeta = ! $this->user->isBeta;
            $this->user->save();
        } else {
            return false;
        }
    }

    public function enrollStaff()
    {
        if (Auth::user()->id === 1) {
            return false;
        } elseif (Auth::check() && Auth::user()->isStaff) {
            $this->user->isStaff = ! $this->user->isStaff;
            $this->user->save();
        } else {
            return false;
        }
    }

    public function enrollDeveloper()
    {
        if (Auth::check() && Auth::user()->isStaff) {
            $this->user->isDeveloper = ! $this->user->isDeveloper;
            $this->user->save();
        } else {
            return false;
        }
    }

    public function flagUser()
    {
        if (Auth::user()->id === 1) {
            return false;
        } elseif (Auth::check() && Auth::user()->isStaff) {
            $this->user->isFlagged = ! $this->user->isFlagged;
            $this->user->save();
        } else {
            return false;
        }
    }

    public function deleteUser()
    {
        if (Auth::user()->id === 1) {
            return false;
        } elseif (Auth::check() && Auth::user()->isStaff) {
            $user = User::find($this->user->id);
            $user->task_praise()->delete();
            $user->tasks()->delete();
            $user->products()->delete();
            $user->delete();

            return redirect()->route('home');
        } else {
            return false;
        }
    }

    public function render()
    {
        return view('livewire.user.moderator');
    }
}
