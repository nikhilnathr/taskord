<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_register_url()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    public function test_register_displays_the_register_form()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }
}
