<?php

namespace App\Http\Controllers;

use App\Question;

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
}
