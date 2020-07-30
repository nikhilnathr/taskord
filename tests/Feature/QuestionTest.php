<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Livewire\Question\CreateQuestion;
use App\Http\Livewire\Questions\SingleQuestion;
use Livewire;
use App\User;
use App\Question;

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
    
    public function test_create_question()
    {
        Livewire::test(CreateQuestion::class)
            ->set('title', md5(microtime()))
            ->set('body', md5(microtime()))
            ->call('submit')
            ->assertSeeHtml('Forbidden!');
    }
    
    public function test_auth_create_question()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);
        
        Livewire::test(CreateQuestion::class)
            ->set('title', md5(microtime()))
            ->call('submit')
            ->assertHasErrors(['body' => 'required'])
            ->set('body', md5(microtime()))
            ->call('submit')
            ->assertStatus(200);
    }
    
    public function test_auth_create_question_with_profanity()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);

        Livewire::test(CreateQuestion::class)
            ->set('title', 'Bitch')
            ->set('body', 'Bitch')
            ->call('submit')
            ->assertHasErrors([
                'body' => 'profanity',
                'body' => 'profanity',
            ]);
    }
    
    public function test_praise_question()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);
        $question = Question::create([
            'user_id' =>  $user->id,
            'title' => md5(microtime()),
            'body' => md5(microtime()),
        ]);

        Livewire::test(SingleQuestion::class, [
                'question' => $question,
                'type' => 'question.question'
            ])
            ->call('togglePraise')
            ->assertSeeHtml('You can&#039;t praise your own question!');
        
        Livewire::test(SingleQuestion::class, [
                'question' => $question,
                'type' => 'question.newest'
            ])
            ->call('togglePraise')
            ->assertSeeHtml('You can&#039;t praise your own question!');
    }
}
