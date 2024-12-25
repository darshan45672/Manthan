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
        // Prepare the data
        $data = [
            'name' => 'Computer Science',
            'image' => 'cs_image.png',
            'dept_code' => 'CS101',
        ];

        // Create a new department
        $department = Department::create($data);

        // Assert the department was created successfully
        $this->assertDatabaseHas('departments', [
            'name' => 'Computer Science',
            'dept_code' => 'CS101',
        ]);
    }

    /** @test */
    public function it_can_read_a_department()
    {
        // Create a department
        $department = Department::factory()->create();

        // Retrieve the department from the database
        $retrievedDepartment = Department::find($department->id);

        // Assert the department data is correct
        $this->assertEquals($department->name, $retrievedDepartment->name);
        $this->assertEquals($department->dept_code, $retrievedDepartment->dept_code);
    }

    /** @test */
    public function it_can_update_a_department()
    {
        // Create a department
        $department = Department::factory()->create();

        // Update the department's data
        $department->update([
            'name' => 'Updated Department',
            'dept_code' => 'CS102',
        ]);

        // Assert the department was updated in the database
        $this->assertDatabaseHas('departments', [
            'id' => $department->id,
            'name' => 'Updated Department',
            'dept_code' => 'CS102',
        ]);
    }

    /** @test */
    public function it_can_delete_a_department()
    {
        // Create a department
        $department = Department::factory()->create();

        // Delete the department
        $department->delete();

        // Assert the department was deleted
        $this->assertDatabaseMissing('departments', [
            'id' => $department->id,
        ]);
    }
}
