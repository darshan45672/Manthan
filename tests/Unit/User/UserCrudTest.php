<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password123'),
            'role' => 'student',
            'phone' => '1234567890',
            'address' => '123 Street, City, Country',
            'email_verified_at' => now(),
            'is_admin' => false,
        ];

        $user = User::create($data);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'is_admin' => false,
        ]);
    }

    /** @test */
    public function it_can_read_a_user()
    {
        $user = User::factory()->create();

        $retrievedUser = User::find($user->id);

        $this->assertEquals($user->name, $retrievedUser->name);
        $this->assertEquals($user->email, $retrievedUser->email);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $user->update([
            'name' => 'Updated Name',
            'email' => 'updated.email@example.com',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated.email@example.com',
        ]);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
