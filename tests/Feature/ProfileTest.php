<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if an authenticated user can access the profile page.
     *
     * @return void
     */
    
    /**
     * Test if an unauthenticated user is redirected to login.
     *
     * @return void
     */
    public function test_unauthenticated_user_is_redirected_to_login()
    {
        $response = $this->get('/user-dashboard/profile');

        // Assert redirection to login
        $response->assertRedirect('/login'); // Ensure your login route matches
    }

    /**
     * Test if an authenticated user sees the correct profile content.
     *
     * @return void
     */
    
    /**
     * Test if a user with an expired session is redirected to login.
     *
     * @return void
     */
    
    /**
     * Test if the profile page can only be accessed using GET method.
     *
     * @return void
     */
    public function test_profile_page_requires_get_method()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user-dashboard/profile');

        // Assert method not allowed or redirection
        $response->assertStatus(405); // Method Not Allowed
    }

    /**
     * Test if a deleted user cannot access the profile page.
     *
     * @return void
     */
    
}
