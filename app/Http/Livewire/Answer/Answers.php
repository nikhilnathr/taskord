<?php

namespace App\Http\Livewire\Answer;

use Livewire\Component;

class Answers extends Component
{
    public $answers;
    
    public function mount($answers)
    {
        $this->answers = $answers;
    }
    
    public function render()
    {
        return view('livewire.answer.answers');
    }
}
