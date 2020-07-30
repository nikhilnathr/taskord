<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Livewire\Task\SingleTask;
use App\Http\Livewire\Task\CreateComment;
use App\Http\Livewire\Task\SingleComment;
use App\Task;
use App\TaskComment;
use App\User;
use Livewire;

class CommentTest extends TestCase
{
    public function test_create_task_comment()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);
        $task = Task::create([
            'user_id' => 1,
            'task' => md5(microtime()),
            'done' => true,
        ]);

        Livewire::test(CreateComment::class, ['task' => $task])
            ->set('comment', md5(microtime()))
            ->call('submit')
            ->assertSeeHtml('Comment has been added!');
    }
    
    public function test_praise_task_comment()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);
        $task_comment = TaskComment::create([
            'user_id' =>  $user->id,
            'task_id' =>  1,
            'comment' => md5(microtime()),
        ]);

        Livewire::test(SingleComment::class, ['comment' => $task_comment])
            ->call('togglePraise')
            ->assertSeeHtml('You can&#039;t praise your own comment!');
    }
    
    public function test_praise_others_task_comment()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);
        $task_comment = TaskComment::create([
            'user_id' =>  2,
            'task_id' =>  1,
            'comment' => md5(microtime()),
        ]);

        Livewire::test(SingleComment::class, ['comment' => $task_comment])
            ->call('togglePraise');
    }
    
    public function test_delete_task_comment()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $this->actingAs($user);
        $task_comment = TaskComment::create([
            'user_id' =>  $user->id,
            'task_id' =>  1,
            'comment' => md5(microtime()),
        ]);

        Livewire::test(SingleComment::class, ['comment' => $task_comment])
            ->call('deleteTaskComment')
            ->assertEmitted('taskCommentDeleted');
    }
}
