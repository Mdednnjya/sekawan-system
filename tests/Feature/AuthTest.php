<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    #[Test] public function register_test() {
        $response = $this->post('/register', [
            'name' => 'register_test',
            'email' => 'register_test@test.com',
            'password' => hash::make('password'),
            'region_id' => 1,
            'role' => 'admin',
            'position' => 'branch manager'
        ]);

        $response->assertRedirect('/');

        // Check if email stored on db
        $this->assertDatabaseHas('users', [
            'email' => 'register_test@test.com',
        ]);
    }

    #[Test] public function login_test() {

        User::where('email', 'login_success@test.com')->delete();

        $user = User::factory()->create([
            'email' => 'login_success@test.com',
            'password' => hash::make('password'),
            'region_id' => 1,
        ]);

        $response = $this->get('/login');
        $response->assertStatus(200);

        $response = $this->post('/login', [
            'email' => 'login_success@test.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/');

        $this->assertAuthenticatedAs($user);
    }

    #[Test] public function login_test_fail()
    {

        User::where('email', 'login_fail@test.com')->delete();

        $User = User::factory()->create([
            'email' => 'login_fail@test.com',
            'password' => hash::make('password'),
            'region_id' => 1,
        ]);

        $response = $this->post('/login', [
            'email' => 'login_fail@test.com',
            'password' => 'wrong_password',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors();

        $this->assertGuest();
    }
}
