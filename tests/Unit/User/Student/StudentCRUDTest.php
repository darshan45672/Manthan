<?php

namespace Tests\Unit\Student;

use App\Models\Student;
use App\Models\User;
use App\Models\College;
use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_student()
    {
        $user = User::factory()->create();
        $college = College::factory()->create();
        $department = Department::factory()->create();

        $data = [
            'user_id' => $user->id,
            'college_id' => $college->id,
            'department_id' => $department->id,
            'usn' => '1234567890',
            'semester' => '5',
        ];

        $student = Student::create($data);

        $this->assertDatabaseHas('students', [
            'user_id' => $user->id,
            'college_id' => $college->id,
            'department_id' => $department->id,
            'usn' => '1234567890',
            'semester' => '5',
        ]);
    }

    /** @test */
    public function it_can_read_a_student()
    {
        $student = Student::factory()->create();

        $retrievedStudent = Student::find($student->id);

        $this->assertEquals($student->usn, $retrievedStudent->usn);
        $this->assertEquals($student->semester, $retrievedStudent->semester);
        $this->assertEquals($student->user_id, $retrievedStudent->user_id);
        $this->assertEquals($student->college_id, $retrievedStudent->college_id);
        $this->assertEquals($student->department_id, $retrievedStudent->department_id);
    }

    /** @test */
    public function it_can_update_a_student()
    {
        $student = Student::factory()->create();

        $student->update([
            'usn' => '9876543210',
            'semester' => '6',
        ]);

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'usn' => '9876543210',
            'semester' => '6',
        ]);
    }

    /** @test */
    public function it_can_delete_a_student()
    {
        $student = Student::factory()->create();

        $student->delete();

        $this->assertModelMissing($student);
    }
}
