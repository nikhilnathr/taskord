<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire;
use App\Http\Livewire\Task\SingleTask;
use App\User;
use App\Task;

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
}
