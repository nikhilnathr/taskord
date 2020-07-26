<?php

namespace App\Http\Livewire\Answer;

use Livewire\Component;

class SingleAnswer extends Component
{
    public $answer;

    public function mount($answer)
    {
        $this->answer = $answer;
    }

    public function render()
    {
        return view('livewire.answer.single-answer');
    }
}
