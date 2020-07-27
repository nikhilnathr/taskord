<?php

namespace App\Http\Livewire\Questions;

use App\QuestionPraise;
use Auth;
use Livewire\Component;

class SingleQuestion extends Component
{
    public $question;
    public $type;

    public function mount($question, $type)
    {
        $this->question = $question;
        $this->type = $type;
    }

    public function togglePraise()
    {
        if (Auth::check()) {
            if (Auth::user()->isFlagged) {
                return session()->flash('error', 'Your account is flagged!');
            }
            if (Auth::user()->id === $this->question->user->id) {
                return session()->flash('error', 'You can\'t praise your own question!');
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
            return session()->flash('error', 'Forbidden!');
        }
    }

    public function deleteQuestion()
    {
        if (Auth::check()) {
            if (Auth::user()->isFlagged) {
                return session()->flash('error', 'Your account is flagged!');
            }

            if (Auth::user()->staffShip or Auth::user()->id === $this->question->user_id) {
                $this->question->delete();

                return redirect()->route('questions.newest');
            } else {
                session()->flash('error', 'Forbidden!');
            }
        } else {
            return session()->flash('error', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.questions.single-question');
    }
}
