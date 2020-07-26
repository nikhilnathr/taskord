<?php

namespace App\Http\Controllers;

use App\Question;
use Auth;

class QuestionController extends Controller
{
    public function newest()
    {
        return view('questions.newest', [
            'type' => 'questions.newest',
        ]);
    }

    public function unanswered()
    {
        return view('questions.unanswered', [
            'type' => 'questions.unanswered',
        ]);
    }

    public function popular()
    {
        return view('questions.popular', [
            'type' => 'questions.popular',
        ]);
    }

    public function question($id)
    {
        $question = Question::where('id', $id)->firstOrFail();

        return view('question.question', [
            'question' => $question,
        ]);
    }
    
    public function new()
    {
        return view('questions.new');
    }
    
    public function edit($id)
    {
        $question = Question::where('id', $id)->firstOrFail();
        
        if (Auth::user()->id === $question->user_id) {
            return view('questions.edit', [
                'question' => $question
            ]);
        } else {
            return redirect()->route('question.question', [
                'id' => $question->id
            ]);
        }
    }
}
