<?php

namespace App\Http\Livewire\User\Settings;

use Auth;
use Livewire\Component;

class Account extends Component
{
    public $user;
    public $username;
    public $email;

    public function mount($user)
    {
        $this->user = $user;
        $this->username = $user->username;
        $this->email = $user->email;
    }

    public function enrollBeta()
    {
        if (Auth::check()) {
            $this->user->isBeta = ! $this->user->isBeta;
            $this->user->save();
            if ($this->user->isBeta) {
                session()->flash('message', 'Your are now beta member!');
            } else {
                session()->flash('message', 'Your are no longer a beta member!');
            }
        } else {
            return false;
        }
    }

    public function updateAccount()
    {
        if (Auth::check()) {
            $this->user->username = $this->username;
            $this->user->email = $this->email;
            $this->user->save();

            return session()->flash('message', 'Your account has been updated!');
        }
    }

    public function render()
    {
        return view('livewire.user.settings.account');
    }
}
