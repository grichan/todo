<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Todo;
use Laravel\Sanctum\Sanctum;
use PhpParser\JsonDecoder;

class TodoTest extends TestCase
{
    /** @test */
    public function user_can_add_todo()
    {

        $user = User::find(1);
        $s = Sanctum::actingAs(
            $user,
            ['*']
        );

        $response = $this->post('/api/todo/store', ['todo' => [
            'body' => "test",
            'user_id' => 1
        ]]);

        $response->assertCreated();
        // created response
        $content = json_decode($response->getContent());
        // added in db
        $this->assertCount(1, Todo::where('id', $content->id)->get());
    }
}
