<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;
use Auth;
use App\QuestionPraise;

class SingleQuestion extends Component
{
    public $question;

    public function mount($question)
    {
        $this->question = $question;
    }
    
    public function togglePraise()
    {
        if (Auth::check()) {
            if (Auth::user()->isFlagged) {
                return session()->flash('message', 'Your account is flagged!');
            }
            if (Auth::user()->id === $this->question->user->id) {
                return session()->flash('message', 'You can\'t praise your own question!');
            }
            $isPraised = QuestionPraise::where([
                ['user_id', Auth::user()->id],
                ['question_id', $this->question->id],
            ])->count();
            if ($isPraised === 1) {
                $praise = QuestionPraise::where([
                    ['user_id', Auth::user()->id],
                    ['question_id', $this->question->id],
                ])->first();
                $praise->delete();
                $this->question->refresh();
            } else {
                $praise = QuestionPraise::create([
                    'user_id' => Auth::user()->id,
                    'question_id' => $this->question->id,
                ]);
                $this->question->refresh();
            }
        } else {
            return session()->flash('message', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.questions.single-question');
    }
}
