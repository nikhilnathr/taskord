<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TasksTest extends TestCase
{
    public function test_tasks_url()
    {
        $response = $this->get(route('tasks'));

        $response->assertStatus(302);
    }
}
