<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;


class LoginTest extends TestCase
{
    /** @test */
    public function user_can_login()
    {

        $user = User::find(1);
        $s = Sanctum::actingAs(
            $user,
            ['*']
        );

        # code...
        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        // dd($response);
        $response->assertOk();
    }
}
