<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthControllerTest extends TestCase
{
    /** @test */
    public function it_should_allow_users_to_login()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('123456')
        ]);

        $response = $this->postJson(route('login'), [
            'username' => $user->email,
            'password' => '123456'
        ]);

        $response->assertSuccessful()
            ->assertJsonStructure([
                'token_type',
                'expires_in',
                'access_token',
                'refresh_token'
            ]);
    }
}



