<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_login_redirect_dashboard()
    {
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'password'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }

    public function test_create_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testa42@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
    }

    public function test_forget_password()
    {

        $response = $this->post('/forgot-password', [
            'email' => 'laurin@example.com',
        ]);

        $response->assertStatus(302);
    }

    public function test_email_verification()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->post('/email/verification-notification');

        $response->assertStatus(302);
    }
    public function test_change_password()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/show_profile')
            ->put('/password', [
                'current_password' => 'password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        $response->assertRedirect('/show_profile');

    }
}
