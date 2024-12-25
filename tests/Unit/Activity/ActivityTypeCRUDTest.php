<?php

namespace Tests\Unit\ActivityType;

use App\Models\ActivityType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTypeCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_activity_type()
    {
        $data = [
            'title' => 'Workshop',
            'description' => 'A technical workshop focused on learning new technologies.',
            'credits' => '5',
        ];

        $activityType = ActivityType::create($data);

        $this->assertDatabaseHas('activity_types', [
            'title' => 'Workshop',
            'credits' => 5,
        ]);
    }

    /** @test */
    public function it_can_read_an_activity_type()
    {
        $activityType = ActivityType::factory()->create();

        $retrievedActivityType = ActivityType::find($activityType->id);

        $this->assertEquals($activityType->title, $retrievedActivityType->title);
        $this->assertEquals($activityType->description, $retrievedActivityType->description);
    }

    /** @test */
    public function it_can_update_an_activity_type()
    {
        $activityType = ActivityType::factory()->create();

        $activityType->update([
            'title' => 'Updated Workshop',
            'credits' => '1',
        ]);

        $this->assertDatabaseHas('activity_types', [
            'id' => $activityType->id,
            'title' => 'Updated Workshop',
            'credits' => 1,
        ]);
    }

    /** @test */
    public function it_can_delete_an_activity_type()
    {
        $activityType = ActivityType::factory()->create();

        $activityType->delete();

        $this->assertDatabaseMissing('activity_types', [
            'id' => $activityType->id,
        ]);
    }
}
