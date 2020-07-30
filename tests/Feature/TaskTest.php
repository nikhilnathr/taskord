<?php

namespace Tests\Feature;

use App\Http\Livewire\Task\SingleTask;
use App\Task;
use App\User;
use Livewire;
use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_task_url()
    {
        $response = $this->get(route('task', ['id' => 1]));

        $response->assertStatus(200);
    }

    public function test_task_displays_the_task_page()
    {
        $response = $this->get(route('task', ['id' => 1]));

        $response->assertStatus(200);
        $response->assertViewIs('task.task');
    }

    public function test_praise_task()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);
        $task = Task::create([
            'user_id' => 1,
            'task' => md5(microtime()),
            'done' => true,
        ]);

        Livewire::test(SingleTask::class, ['task' => $task])
            ->call('togglePraise')
            ->assertSeeHtml('You can&#039;t praise your own task!');
    }

    public function test_praise_others_task()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);
        $task = Task::create([
            'user_id' => 2,
            'task' => md5(microtime()),
            'done' => true,
        ]);

        Livewire::test(SingleTask::class, ['task' => $task])
            ->call('togglePraise');
    }

    public function test_delete_task()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);
        $task = Task::create([
            'user_id' => 1,
            'task' => md5(microtime()),
            'done' => true,
        ]);

        Livewire::test(SingleTask::class, ['task' => $task])
            ->call('deleteTask')
            ->assertEmitted('taskDeleted');
    }
}
