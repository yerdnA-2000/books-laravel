<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_registration()
    {
        $response = $this->post('/api/registration', ['email' => 'test@test.com', 'password' => 'test']);

        $response->assertJsonPath('user.email', 'test@test.com');
    }
}
