<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

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
}
