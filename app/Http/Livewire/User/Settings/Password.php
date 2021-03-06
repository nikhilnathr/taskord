<?php

namespace App\Http\Livewire\User\Settings;

use Auth;
use Hash;
use Livewire\Component;

class Password extends Component
{
    public $user;
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ]);
    }

    public function updatePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $user = Auth::user();

        if (! Hash::check($this->currentPassword, $user->password)) {
            return session()->flash('error', 'Current password does not match!');
        }

        $user->password = Hash::make($this->newPassword);
        $user->save();

        return session()->flash('success', 'Your password has been changed!');
    }

    public function render()
    {
        return view('livewire.user.settings.password');
    }
}
