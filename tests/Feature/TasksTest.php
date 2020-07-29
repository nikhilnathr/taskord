<?php

namespace Tests\Feature;

use Tests\TestCase;

class TasksTest extends TestCase
{
    public function test_tasks_url()
    {
        $response = $this->get(route('tasks'));

        $response->assertStatus(302);
    }
}
