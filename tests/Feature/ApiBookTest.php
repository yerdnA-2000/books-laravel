<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ApiBookTest extends TestCase
{
    public function test_api_book_index()
    {
        $token = User::where('email', 'vasya@test.com')->first()->api_token;

        $response = $this->get('/api/books?api_token=' . $token);

        $response->assertStatus(200);
    }
}
