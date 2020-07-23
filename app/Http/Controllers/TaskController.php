<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task($id)
    {
        $task = Task::where('id', $id)->firstOrFail();

        return view('task/task', [
            'task' => $task,
        ]);
    }
}
