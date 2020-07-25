<?php

namespace App\Http\Livewire\User\Settings;

use Livewire\Component;

class Password extends Component
{
    public $user;
    public $existingPassword;
    public $newPassword;
    public $confirmPassword;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function updateAccount()
    {
        $this->user->username = $this->username;
        $this->user->email = $this->email;
        $this->user->save();

        return session()->flash('message', 'Your account has been updated!');
    }

    public function render()
    {
        return view('livewire.user.settings.password');
    }
}
