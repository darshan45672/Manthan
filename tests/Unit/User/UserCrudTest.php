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
        // Prepare the data
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

        // Create a new user
        $user = User::create($data);

        // Assert the user was created successfully
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'is_admin' => false,
        ]);
    }

    /** @test */
    public function it_can_read_a_user()
    {
        // Create a user
        $user = User::factory()->create();

        // Retrieve the user from the database
        $retrievedUser = User::find($user->id);

        // Assert the user data is correct
        $this->assertEquals($user->name, $retrievedUser->name);
        $this->assertEquals($user->email, $retrievedUser->email);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        // Create a user
        $user = User::factory()->create();

        // Update the user's data
        $user->update([
            'name' => 'Updated Name',
            'email' => 'updated.email@example.com',
        ]);

        // Assert the user was updated in the database
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated.email@example.com',
        ]);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        // Create a user
        $user = User::factory()->create();

        // Delete the user
        $user->delete();

        // Assert the user was deleted
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
