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

    public function updated($field)
    {
        $this->validateOnly($field, [
            'username' => 'required|alpha_dash|string|max:20|unique:users',
            'email' => 'required|email|unique:users',
        ]);
    }

    public function updateAccount()
    {
        $this->validate([
            'username' => 'required|alpha_dash|string|max:20|unique:users',
            'email' => 'required|email|unique:users',
        ]);

        if (Auth::check()) {
            $this->user->username = $this->username;
            $this->user->email = $this->email;
            $this->user->save();

            return session()->flash('message', 'Your profile has been updated!');
        }
    }

    public function render()
    {
        return view('livewire.user.settings.account');
    }
}
