<?php
namespace Tests\Unit\HoD;

use App\Models\HoD;
use App\Models\User;
use App\Models\College;
use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HoDCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_hod()
    {
        $user = User::factory()->create();
        $college = College::factory()->create();
        $department = Department::factory()->create();

        $hod = HoD::create([
            'user_id' => $user->id,
            'college_id' => $college->id,
            'department_id' => $department->id,
            'qualification' => ['PhD'],
            'experience' => 10,
            'specialization' => ['AI', 'ML'],
            'joining_date' => '2020-01-01',
            'leaving_date' => '2025-12-31',
        ]);

        $this->assertDatabaseHas('ho_d_s', [
            'user_id' => $user->id,
            'college_id' => $college->id,
            'department_id' => $department->id,
            'experience' => 10,
        ]);

        $savedHoD = HoD::find($hod->id);
        $this->assertEquals(['PhD'], $savedHoD->qualification);
        $this->assertEquals(['AI', 'ML'], $savedHoD->specialization);
    }

    /** @test */
    public function it_can_read_a_hod()
    {
        $hod = HoD::factory()->create();

        $retrievedHoD = HoD::find($hod->id);

        $this->assertEquals($hod->id, $retrievedHoD->id);
    }

    /** @test */
    public function it_can_update_a_hod()
    {
        $hod = HoD::factory()->create();

        $hod->update([
            'qualification' => ['MSc'],
            'experience' => 20,
            'specialization' => ['Cloud Computing'],
            'leaving_date' => '2025-12-31',
        ]);

        $this->assertEquals(['MSc'], $hod->qualification);
        $this->assertEquals(20, $hod->experience);
        $this->assertEquals(['Cloud Computing'], $hod->specialization);
        $this->assertEquals('2025-12-31', $hod->leaving_date);
    }

    /** @test */
    public function it_can_delete_a_hod()
    {
        $hod = HoD::factory()->create();

        $hod->delete();

        $this->assertModelMissing($hod);
    }
}
