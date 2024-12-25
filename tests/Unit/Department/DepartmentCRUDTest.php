<?php

namespace Tests\Unit\Department;

use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_department()
    {
        $data = [
            'name' => 'Computer Science',
            'image' => 'cs_image.png',
            'dept_code' => 'CS101',
        ];

        $department = Department::create($data);

        $this->assertDatabaseHas('departments', [
            'name' => 'Computer Science',
            'dept_code' => 'CS101',
        ]);
    }

    /** @test */
    public function it_can_read_a_department()
    {
        $department = Department::factory()->create();

        $retrievedDepartment = Department::find($department->id);

        $this->assertEquals($department->name, $retrievedDepartment->name);
        $this->assertEquals($department->dept_code, $retrievedDepartment->dept_code);
    }

    /** @test */
    public function it_can_update_a_department()
    {
        $department = Department::factory()->create();

        $department->update([
            'name' => 'Updated Department',
            'dept_code' => 'CS102',
        ]);
        
        $this->assertDatabaseHas('departments', [
            'id' => $department->id,
            'name' => 'Updated Department',
            'dept_code' => 'CS102',
        ]);
    }

    /** @test */
    public function it_can_delete_a_department()
    {
        $department = Department::factory()->create();

        $department->delete();

        $this->assertDatabaseMissing('departments', [
            'id' => $department->id,
        ]);
    }
}
