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
    
    public function updated($field)
    {
        if (Auth::check()) {
            $this->validateOnly($field, [
                'answer' => 'required|profanity',
            ],
            [
                'answer.profanity' => 'Please check your words!',
            ]);
        } else {
            session()->flash('error', 'Forbidden!');
        }
    }
    
    public function submit()
    {
        if (Auth::check()) {
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
        } else {
            session()->flash('error', 'Forbidden!');
        }
    }
    
    public function render()
    {
        return view('livewire.answer.create-answer');
    }
}
