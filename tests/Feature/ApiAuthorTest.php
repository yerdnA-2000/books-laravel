<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiAuthorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_authors_with_count_books_index()
    {
        $response = $this->get('/api/authors');

        $response->assertStatus(200);
    }

    public function test_author_with_books_show()
    {
        $response = $this->get('/api/authors/1');

        $response->assertStatus(200);
    }

    public function test_author_update()
    {
        $user = User::where('email', 'vasya@test.com')->first();

        $response = $this->put('/api/authors/'. $user->id . '?api_token=' . $user->api_token, ['full_name' => 'test']);

        $response->assertStatus(200);
    }
}
