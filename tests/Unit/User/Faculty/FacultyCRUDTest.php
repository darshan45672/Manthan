<?php

namespace Tests\Unit\Faculty;

use App\Models\Faculty;
use App\Models\User;
use App\Models\College;
use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FacultyCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_faculty()
    {
        $user = User::factory()->create();
        $college = College::factory()->create();
        $department = Department::factory()->create();

        $faculty = Faculty::create([
            'user_id' => $user->id,
            'college_id' => $college->id,
            'department_id' => $department->id,
            'designation' => 'Professor',
            'qualification' => ['PhD'],
            'experience' => 10,
            'specialization' => ['AI', 'ML'],
            'joining_date' => '2020-01-01',
            'leaving_date' => null,
            'status' => true,
            'is_cordinator' => true
        ]);

        $this->assertDatabaseHas('faculties', [
            'user_id' => $user->id,
            'college_id' => $college->id,
            'department_id' => $department->id,
            'designation' => 'Professor',
            'experience' => 10,
            'status' => 1,
            'is_cordinator' => 1
        ]);

        $savedFaculty = Faculty::find($faculty->id);
        $this->assertEquals(['PhD'], $savedFaculty->qualification);
        $this->assertEquals(['AI', 'ML'], $savedFaculty->specialization);
    }

    /** @test */
    public function it_can_read_a_faculty()
    {
        $faculty = Faculty::factory()->create();

        $retrievedFaculty = Faculty::find($faculty->id);

        $this->assertEquals($faculty->id, $retrievedFaculty->id);
        $this->assertEquals($faculty->designation, $retrievedFaculty->designation);
    }

    /** @test */
    public function it_can_update_a_faculty()
    {
        $faculty = Faculty::factory()->create();

        $faculty->update([
            'designation' => 'Associate Professor',
            'qualification' => ['MSc'], 
            'experience' => 7,
            'specialization' => ['Advanced Mathematics'], 
            'status' => false,
            'is_cordinator' => false
        ]);

        $this->assertEquals('Associate Professor', $faculty->designation);
        $this->assertEquals(['MSc'], $faculty->qualification);
        $this->assertEquals(7, $faculty->experience);
        $this->assertEquals(['Advanced Mathematics'], $faculty->specialization);
        $this->assertFalse($faculty->status);
        $this->assertFalse($faculty->is_cordinator);
    }

    /** @test */
    public function it_can_delete_a_faculty()
    {
        $faculty = Faculty::factory()->create();

        $faculty->delete();

        $this->assertModelMissing($faculty);
    }
}