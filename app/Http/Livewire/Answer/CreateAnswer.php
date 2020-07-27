<?php

namespace App\Http\Livewire\Answer;

use Livewire\Component;
use Auth;
use App\Answer;

class CreateAnswer extends Component
{
    public $answer;
    public $question;

    public function mount($question)
    {
        $this->question = $question;
    }
    
    public function submit()
    {
        $validatedData = $this->validate([
            'answer' => 'required|profanity',
        ],
        [
            'answer.profanity' => 'Please check your words!',
        ]);

        if (Auth::user()->isFlagged) {
            return session()->flash('error', 'Your account is flagged!');
        }

        $canswer = Answer::create([
            'user_id' =>  Auth::user()->id,
            'question_id' =>  $this->question->id,
            'answer' => $this->answer,
        ]);

        $this->emit('answerAdded');
        $this->answer = '';

        return session()->flash('success', 'Answer has been added!');
    }
    
    public function render()
    {
        return view('livewire.answer.create-answer');
    }
}
