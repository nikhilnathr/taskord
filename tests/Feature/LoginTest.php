<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_login_url()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }
    
    public function test_login_displays_the_login_form()
    {
        $response = $this->get(route('login'));
    
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }
}
