<?php

namespace Tests\Unit\College;

use App\Models\College;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CollegeCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_college()
    {
        // Prepare the data
        $data = [
            'name' => 'XYZ University',
            'email' => 'contact@xyzuniversity.com',
            'phone' => '9876543210',
            'address' => '456 University Rd, City, Country',
            'logo' => 'logo.png',
            'website' => 'https://xyzuniversity.com',
            'college_code' => 'XYZ123',
        ];

        // Create a new college
        $college = College::create($data);

        // Assert the college was created successfully
        $this->assertDatabaseHas('colleges', [
            'name' => 'XYZ University',
            'email' => 'contact@xyzuniversity.com',
            'college_code' => 'XYZ123',
        ]);
    }

    /** @test */
    public function it_can_read_a_college()
    {
        // Create a college
        $college = College::factory()->create();

        // Retrieve the college from the database
        $retrievedCollege = College::find($college->id);

        // Assert the college data is correct
        $this->assertEquals($college->name, $retrievedCollege->name);
        $this->assertEquals($college->email, $retrievedCollege->email);
    }

    /** @test */
    public function it_can_update_a_college()
    {
        // Create a college
        $college = College::factory()->create();

        // Update the college's data
        $college->update([
            'name' => 'Updated University',
            'email' => 'contact@updateduniversity.com',
        ]);

        // Assert the college was updated in the database
        $this->assertDatabaseHas('colleges', [
            'id' => $college->id,
            'name' => 'Updated University',
            'email' => 'contact@updateduniversity.com',
        ]);
    }

    /** @test */
    public function it_can_delete_a_college()
    {
        // Create a college
        $college = College::factory()->create();

        // Delete the college
        $college->delete();

        // Assert the college was deleted
        $this->assertDatabaseMissing('colleges', [
            'id' => $college->id,
        ]);
    }
}
