<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    public function test_question_url()
    {
        $response = $this->get(route('question.question', ['id' => 1]));

        $response->assertStatus(200);
    }
    
    public function test_question_displays_the_question_page()
    {
        $response = $this->get(route('question.question', ['id' => 1]));
    
        $response->assertStatus(200);
        $response->assertViewIs('question.question');
    }
}
