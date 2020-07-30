<?php

namespace App\Http\Livewire\User;

use Auth;
use Livewire\Component;

class Follow extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function followUser()
    {
        if (Auth::check()) {
            if (Auth::user()->isFlagged) {
                return session()->flash('error', 'Your account is flagged!');
            }
            if (Auth::id() === $this->user->id) {
                return session()->flash('error', 'You can\'t follow yourself!');
            } else {
                Auth::user()->toggleFollow($this->user);
            }
        } else {
            return session()->flash('error', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.user.follow');
    }
}
