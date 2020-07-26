<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;

class SingleQuestion extends Component
{
    public $question;

    public function mount($question)
    {
        $this->question = $question;
    }
    
    public function render()
    {
        return view('livewire.questions.single-question');
    }
}
