<?php

namespace App\Http\Livewire\User\Settings;

use Livewire\Component;
use Auth;
use App\User;

class Delete extends Component
{
    public $user;
    public $confirming;

    public function mount($user)
    {
        $this->user = $user;
    }
    
    public function confirmDelete()
    {
        $this->confirming = $this->user->id;
    }
    
    public function deleteAccount()
    {
        if (Auth::check()) {
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
    
    public function exportAccount()
    {
        if (Auth::check()) {
            
        } else {
            return false;
        }
    }

    public function render()
    {
        return view('livewire.user.settings.delete');
    }
}
