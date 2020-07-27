<?php

namespace App\Http\Livewire\Questions;

use App\Question;
use Auth;
use Livewire\Component;

class EditQuestion extends Component
{
    public $question;
    public $title;
    public $body;

    public function mount($question)
    {
        $this->question = $question;
        $this->title = $question->title;
        $this->body = $question->body;
    }

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

        $question = Question::where('id', $this->question->id)->firstOrFail();

        if (Auth::user()->staffShip or Auth::user()->id === $question->user_id) {
            $question->user_id = Auth::user()->staffShip ? $this->question->user->id : Auth::user()->id;
            $question->title = $this->title;
            $question->body = $this->body;
            $question->save();

            session()->flash('message', 'Question has been posted!');

            return redirect()->route('question.question', ['id' => $question->id]);
        } else {
            session()->flash('error', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.questions.edit-question');
    }
}