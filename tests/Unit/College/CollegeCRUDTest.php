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
        $data = [
            'name' => 'XYZ University',
            'email' => 'contact@xyzuniversity.com',
            'phone' => '9876543210',
            'address' => '456 University Rd, City, Country',
            'logo' => 'logo.png',
            'website' => 'https://xyzuniversity.com',
            'college_code' => 'XYZ123',
        ];

        $college = College::create($data);

        $this->assertDatabaseHas('colleges', [
            'name' => 'XYZ University',
            'email' => 'contact@xyzuniversity.com',
            'college_code' => 'XYZ123',
        ]);
    }

    /** @test */
    public function it_can_read_a_college()
    {
        $college = College::factory()->create();

        $retrievedCollege = College::find($college->id);

        $this->assertEquals($college->name, $retrievedCollege->name);
        $this->assertEquals($college->email, $retrievedCollege->email);
    }

    /** @test */
    public function it_can_update_a_college()
    {
        $college = College::factory()->create();

        $college->update([
            'name' => 'Updated University',
            'email' => 'contact@updateduniversity.com',
        ]);

        $this->assertDatabaseHas('colleges', [
            'id' => $college->id,
            'name' => 'Updated University',
            'email' => 'contact@updateduniversity.com',
        ]);
    }

    /** @test */
    public function it_can_delete_a_college()
    {
        $college = College::factory()->create();

        $college->delete();

        $this->assertDatabaseMissing('colleges', [
            'id' => $college->id,
        ]);
    }
}
