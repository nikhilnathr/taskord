<?php

namespace App\Http\Livewire\Question;

use Livewire\Component;
use Auth;

class Question extends Component
{
    public $question;

    public function mount($question)
    {
        $this->question = $question;
    }
    
    public function deleteQuestion()
    {
        if (Auth::user()->isFlagged) {
            return session()->flash('error', 'Your account is flagged!');
        }
        
        if (Auth::user()->id === $this->question->user_id) {
            $this->question->delete();

            return redirect()->route('questions.newest');
        } else {
            session()->flash('error', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.question.question');
    }
}
