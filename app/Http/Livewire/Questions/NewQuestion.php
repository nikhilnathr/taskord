<?php

namespace App\Http\Livewire\Questions;

use App\Question;
use Auth;
use Livewire\Component;

class NewQuestion extends Component
{
    public $title;
    public $body;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'title' => 'required|profanity|min:5|max:100',
            'body' => 'required|profanity|min:3|max:10000',
        ],
        [
            'title.profanity' => 'Please check your words!',
            'body.profanity' => 'Please check your words!',
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'title' => 'required|profanity|min:5|max:100',
            'body' => 'required|profanity|min:3|max:10000',
        ],
        [
            'title.profanity' => 'Please check your words!',
            'body.profanity' => 'Please check your words!',
        ]);

        if (Auth::user()->isFlagged) {
            return session()->flash('error', 'Your account is flagged!');
        }

        $question = Question::create([
            'user_id' =>  Auth::user()->id,
            'title' => $this->title,
            'body' => $this->body,
        ]);

        session()->flash('message', 'Question has been posted!');

        return redirect()->route('question', ['id' => $question->id]);
    }

    public function render()
    {
        return view('livewire.questions.new-question');
    }
}
