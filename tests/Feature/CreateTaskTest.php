<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateTask;
use App\User;
use Livewire;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    public function test_create_task()
    {
        Livewire::test(CreateTask::class)
            ->set('task', md5(microtime()))
            ->set('done', true)
            ->call('submit')
            ->assertSeeHtml('Forbidden!');
    }

    public function test_auth_create_task()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);

        Livewire::test(CreateTask::class)
            ->set('task', md5(microtime()))
            ->set('done', true)
            ->call('submit')
            ->assertSeeHtml('Task has been created!');
    }

    public function test_auth_create_task_with_profanity()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);

        Livewire::test(CreateTask::class)
            ->set('task', 'Bitch')
            ->set('done', true)
            ->call('submit')
            ->assertSeeHtml('Please check your words!');
    }
}
