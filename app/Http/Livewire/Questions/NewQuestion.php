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
        if (Auth::check()) {
            $this->validateOnly($field, [
                'title' => 'required|profanity|min:5|max:100',
                'body' => 'required|profanity|min:3|max:10000',
            ],
            [
                'title.profanity' => 'Please check your words!',
                'body.profanity' => 'Please check your words!',
            ]);
        } else {
            session()->flash('error', 'Forbidden!');
        }
    }

    public function submit()
    {
        if (Auth::check()) {
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
    
            session()->flash('success', 'Question has been posted!');
    
            return redirect()->route('question.question', ['id' => $question->id]);
        } else {
            session()->flash('error', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.questions.new-question');
    }
}
