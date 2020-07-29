<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_login_url()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    public function test_auth_login_back_to_home_url()
    {
        $user = User::where(['email' => 'dabbit@tuta.io'])->first();
        $response = $this->actingAs($user)->get(route('login'));

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_login_displays_the_login_form()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }
}
