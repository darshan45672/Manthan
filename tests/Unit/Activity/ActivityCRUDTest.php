<?php

namespace Tests\Unit\Activity;

use App\Models\Activity;
use App\Models\Student;
use App\Models\ActivityType;
use App\Models\ProgramExpectedOutcomes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_activity()
    {
        $student = Student::factory()->create();
        $activityType = ActivityType::factory()->create();
        $programExpectedOutcome = ProgramExpectedOutcomes::factory()->create();

        $data = [
            'student_id' => $student->id,
            'activity_type_id' => $activityType->id,
            'title' => 'Sample Activity',
            'description' => 'Sample activity description',
            'program_expected_outcomes_id' => $programExpectedOutcome->id,
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'hours' => 10,
            'file' => ['file1.pdf', 'file2.pdf'],
            'certificate' => ['certificate1.pdf'],
            'status' => 'completed',
        ];

        $activity = Activity::create($data);

        $this->assertDatabaseHas('activities', [
            'student_id' => $student->id,
            'activity_type_id' => $activityType->id,
            'title' => 'Sample Activity',
            'description' => 'Sample activity description',
            'program_expected_outcomes_id' => $programExpectedOutcome->id,
            'hours' => 10,
            'file' => json_encode(['file1.pdf', 'file2.pdf']),
            'certificate' => json_encode(['certificate1.pdf']),
            'status' => 'completed',
        ]);
    }

    /** @test */
    public function it_can_read_an_activity()
    {
        $student = Student::factory()->create();
        $activityType = ActivityType::factory()->create();
        $programExpectedOutcome = ProgramExpectedOutcomes::factory()->create();

        $activity = Activity::create([
            'student_id' => $student->id,
            'activity_type_id' => $activityType->id,
            'title' => 'Sample Activity',
            'description' => 'Sample activity description',
            'program_expected_outcomes_id' => $programExpectedOutcome->id,
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'hours' => 10,
            'file' => ['file1.pdf', 'file2.pdf'],
            'certificate' => ['certificate1.pdf'],
            'status' => 'completed',
        ]);

        $retrievedActivity = Activity::find($activity->id);

        $this->assertEquals($activity->title, $retrievedActivity->title);
        $this->assertEquals($activity->description, $retrievedActivity->description);
        $this->assertEquals($activity->hours, $retrievedActivity->hours);
        $this->assertEquals($activity->status, $retrievedActivity->status);
        $this->assertEquals($activity->student_id, $retrievedActivity->student_id);
    }

    /** @test */
    public function it_can_update_an_activity()
    {
        $student = Student::factory()->create();
        $activityType = ActivityType::factory()->create();
        $programExpectedOutcome = ProgramExpectedOutcomes::factory()->create();

        $activity = Activity::create([
            'student_id' => $student->id,
            'activity_type_id' => $activityType->id,
            'title' => 'Sample Activity',
            'description' => 'Sample activity description',
            'program_expected_outcomes_id' => $programExpectedOutcome->id,
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'hours' => 10,
            'file' => ['file1.pdf', 'file2.pdf'],
            'certificate' => ['certificate1.pdf'],
            'status' => 'completed',
        ]);

        $activity->update([
            'title' => 'Updated Activity Title',
            'status' => 'in-progress',
        ]);

        $this->assertDatabaseHas('activities', [
            'id' => $activity->id,
            'title' => 'Updated Activity Title',
            'status' => 'in-progress',
        ]);
    }

    /** @test */
    public function it_can_delete_an_activity()
    {
        $student = Student::factory()->create();
        $activityType = ActivityType::factory()->create();
        $programExpectedOutcome = ProgramExpectedOutcomes::factory()->create();

        $activity = Activity::create([
            'student_id' => $student->id,
            'activity_type_id' => $activityType->id,
            'title' => 'Sample Activity',
            'description' => 'Sample activity description',
            'program_expected_outcomes_id' => $programExpectedOutcome->id,
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'hours' => 10,
            'file' => ['file1.pdf', 'file2.pdf'],
            'certificate' => ['certificate1.pdf'],
            'status' => 'completed',
        ]);

        $activity->delete();

        $this->assertDatabaseMissing('activities', [
            'id' => $activity->id,
        ]);
    }
}
