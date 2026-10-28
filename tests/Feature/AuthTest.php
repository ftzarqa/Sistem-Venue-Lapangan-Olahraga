<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Masuk ke Akun Anda');
    }

    public function test_users_can_authenticate_as_admin(): void
    {
        $admin = User::create([
            'name'     => 'Admin Test',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        $response = $this->post('/login', [
            'email'    => 'admin@gmail.com',
            'password' => 'admin123',
        ]);

        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect(route('alat-olahraga.index'));
    }

    public function test_users_can_authenticate_as_user(): void
    {
        $user = User::create([
            'name'     => 'User Test',
            'email'    => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'role'     => 'user',
        ]);

        $response = $this->post('/login', [
            'email'    => 'user@gmail.com',
            'password' => 'user123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('alat-olahraga.index'));
    }

    public function test_users_cannot_authenticate_with_invalid_password(): void
    {
        User::create([
            'name'     => 'User Test',
            'email'    => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'role'     => 'user',
        ]);

        $response = $this->from('/login')->post('/login', [
            'email'    => 'user@gmail.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
    }

    public function test_authenticated_user_can_logout(): void
    {
        $user = User::create([
            'name'     => 'User Test',
            'email'    => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'role'     => 'user',
        ]);

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('login'));
    }

    public function test_guest_cannot_access_dashboard(): void
    {
        $response = $this->get(route('alat-olahraga.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_regular_user_cannot_access_crud_create_page(): void
    {
        $user = User::create([
            'name'     => 'Regular User',
            'email'    => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'role'     => 'user',
        ]);

        $response = $this->actingAs($user)->get(route('alat-olahraga.create'));

        $response->assertStatus(403);
    }

    public function test_admin_can_access_crud_create_page(): void
    {
        $admin = User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        $response = $this->actingAs($admin)->get(route('alat-olahraga.create'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Alat Olahraga');
    }
}
