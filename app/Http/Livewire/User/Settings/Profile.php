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

    public function updated($field)
    {
        $this->validateOnly($field, [
            'firstname' => 'profanity|max:30',
            'lastname' => 'profanity|max:30',
            'bio' => 'profanity|max:200',
            'location' => 'profanity|max:30',
            'company' => 'profanity|max:30',
            'website' => 'active_url',
            'twitter' => 'alpha_dash|max:30',
            'twitch' => 'alpha_dash|max:200',
            'telegram' => 'alpha_dash|max:30',
            'github' => 'alpha_dash|max:30',
            'youtube' => 'alpha_dash|max:30',
        ],
        [
            'firstname.profanity' => 'Please check your words!',
            'lastname.profanity' => 'Please check your words!',
            'bio.profanity' => 'Please check your words!',
            'location.profanity' => 'Please check your words!',
            'company.profanity' => 'Please check your words!',
        ]);
    }

    public function updateProfile()
    {
        $validatedData = $this->validate([
            'firstname' => 'profanity|max:30',
            'lastname' => 'profanity|max:30',
            'bio' => 'profanity|max:200',
            'location' => 'profanity|max:30',
            'company' => 'profanity|max:30',
        ],
        [
            'firstname.profanity' => 'Please check your words!',
            'lastname.profanity' => 'Please check your words!',
            'bio.profanity' => 'Please check your words!',
            'location.profanity' => 'Please check your words!',
            'company.profanity' => 'Please check your words!',
        ]);

        if (Auth::check()) {
            $this->user->firstname = $this->firstname;
            $this->user->lastname = $this->lastname;
            $this->user->bio = $this->bio;
            $this->user->location = $this->location;
            $this->user->company = $this->company;
            $this->user->save();

            return session()->flash('profile', 'Your profile has been updated!');
        }
    }

    public function updateSocial()
    {
        $validatedData = $this->validate([
            'website' => 'profanity|active_url',
            'twitter' => 'profanity|alpha_dash|max:30',
            'twitch' => 'profanity|alpha_dash|max:200',
            'telegram' => 'profanity|alpha_dash|max:30',
            'github' => 'profanity|alpha_dash|max:30',
            'youtube' => 'profanity|alpha_dash|max:30',
        ],
        [
            'website.profanity' => 'Please check your words!',
            'twitter.profanity' => 'Please check your words!',
            'twitch.profanity' => 'Please check your words!',
            'telegram.profanity' => 'Please check your words!',
            'github.profanity' => 'Please check your words!',
            'youtube.profanity' => 'Please check your words!',
        ]);

        if (Auth::check()) {
            $this->user->website = $this->website;
            $this->user->twitter = $this->twitter;
            $this->user->twitch = $this->twitch;
            $this->user->telegram = $this->telegram;
            $this->user->github = $this->github;
            $this->user->youtube = $this->youtube;
            $this->user->save();

            return session()->flash('social', 'Your social links has been updated!');
        }
    }

    public function onlyFollowingsTasks()
    {
        if (Auth::check() && Auth::user()->id === $this->user->id) {
            $this->user->onlyFollowingsTasks = ! $this->user->onlyFollowingsTasks;
            $this->user->save();
            if ($this->user->onlyFollowingsTasks) {
                session()->flash('showfollowing', 'Only following user\'s task will be show on homepage');
            } else {
                session()->flash('showfollowing', 'All user\'s task will be show on homepage');
            }
        } else {
            return false;
        }
    }

    public function render()
    {
        return view('livewire.user.settings.profile');
    }
}
