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
                return session()->flash('message', 'Your account is flagged!');
            }
            if (Auth::user()->id === $this->user->id) {
                return session()->flash('message', 'You can\'t follow yourself!');
            } else {
                Auth::user()->toggleFollow($this->user);
            }
        } else {
            return session()->flash('message', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.user.follow');
    }
}
