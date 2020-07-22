<?php

namespace App\Http\Livewire\User\Settings;

use Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user;
    // Profile
    public $firstname;
    public $lastname;
    public $bio;
    public $location;
    public $company;
    // Social
    public $website;
    public $twitter;
    public $twitch;
    public $telegram;
    public $github;
    public $youtube;

    public function mount($user)
    {
        $this->user = $user;
        // Profile
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->bio = $user->bio;
        $this->location = $user->location;
        $this->company = $user->company;
        // Social
        $this->website = $user->website;
        $this->twitter = $user->twitter;
        $this->twitch = $user->twitch;
        $this->telegram = $user->telegram;
        $this->github = $user->github;
        $this->youtube = $user->youtube;
    }

    public function updateName()
    {
        if (Auth::check()) {
            $this->user->firstname = $this->firstname;
            $this->user->lastname = $this->lastname;
            $this->user->bio = $this->bio;
            $this->user->location = $this->location;
            $this->user->company = $this->company;
            $this->user->save();

            return session()->flash('message', 'Your profile has been updated!');
        }
    }

    public function updateSocial()
    {
        if (Auth::check()) {
            $this->user->website = $this->website;
            $this->user->twitter = $this->twitter;
            $this->user->twitch = $this->twitch;
            $this->user->telegram = $this->telegram;
            $this->user->github = $this->github;
            $this->user->youtube = $this->youtube;
            $this->user->save();

            return session()->flash('message', 'Your social links has been updated!');
        }
    }

    public function render()
    {
        return view('livewire.user.settings.profile');
    }
}
