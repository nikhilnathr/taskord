<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
