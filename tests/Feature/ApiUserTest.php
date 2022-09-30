<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiUserTest extends TestCase
{
    use RefreshDatabase;

    /*public function test_index() {
        $response = $this->get('/api/');

        $response->assertStatus(200);
    }

    public function test_show()
    {
        $response = $this->get('/api/users/2');

        $response->assertStatus(200);
    }*/

    public function test_api_user_store() {
        $response = $this->post('/api/users', ['email' => 'test@test.com', 'password' => 'test']);

        $response->assertJsonPath('data.email', 'test@test.com');
    }
}
