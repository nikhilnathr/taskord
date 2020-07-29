<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionsTest extends TestCase
{
    public function test_questions_newest_url()
    {
        $response = $this->get(route('questions.newest'));

        $response->assertStatus(200);
    }
    
    public function test_questions_newest_displays_the_questions_newest_page()
    {
        $response = $this->get(route('questions.newest'));
    
        $response->assertStatus(200);
        $response->assertViewIs('questions.newest');
    }
    
    public function test_unanswered_newest_url()
    {
        $response = $this->get(route('questions.unanswered'));

        $response->assertStatus(200);
    }
    
    public function test_questions_unanswered_displays_the_questions_unanswered_page()
    {
        $response = $this->get(route('questions.unanswered'));
    
        $response->assertStatus(200);
        $response->assertViewIs('questions.unanswered');
    }
    
    public function test_popular_newest_url()
    {
        $response = $this->get(route('questions.popular'));

        $response->assertStatus(200);
    }
    
    public function test_questions_popular_displays_the_questions_popular_page()
    {
        $response = $this->get(route('questions.popular'));
    
        $response->assertStatus(200);
        $response->assertViewIs('questions.popular');
    }
    
    public function test_new_question_url()
    {
        $response = $this->get(route('questions.new'));

        $response->assertStatus(302);
    }
    
    public function test_edit_question_url()
    {
        $response = $this->get(route('question.edit', ['id' => 1]));

        $response->assertStatus(302);
    }
}
