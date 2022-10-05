<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_login()
    {
        $response = $this->post('/api/login', ['email' => 'vasya@test.com', 'password' => 'vasya']);

        $response->assertStatus(200);
    }
}
