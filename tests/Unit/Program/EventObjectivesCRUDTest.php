<?php

namespace Tests\Unit\EventObjectives;

use App\Models\Program;
use App\Models\EventObjectives;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventObjectivesCRUDTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating an event objective.
     *
     * @return void
     */
    public function test_can_create_event_objective()
    {
        // Create a program
        $program = Program::factory()->create();

        // Create an event objective and assert its creation
        $eventObjective = EventObjectives::create([
            'name' => 'Objective 1',
            'description' => 'This is a description for Objective 1',
            'program_id' => $program->id,
        ]);

        $this->assertDatabaseHas('event_objectives', [
            'name' => 'Objective 1',
            'description' => 'This is a description for Objective 1',
            'program_id' => $program->id,
        ]);
    }

    /**
     * Test reading an event objective.
     *
     * @return void
     */
    public function test_can_read_event_objective()
    {
        // Create a program
        $program = Program::factory()->create();

        // Create an event objective
        $eventObjective = EventObjectives::create([
            'name' => 'Objective 2',
            'description' => 'This is a description for Objective 2',
            'program_id' => $program->id,
        ]);

        // Fetch the event objective from the database
        $fetchedObjective = EventObjectives::find($eventObjective->id);

        $this->assertEquals($eventObjective->id, $fetchedObjective->id);
        $this->assertEquals($eventObjective->name, $fetchedObjective->name);
        $this->assertEquals($eventObjective->description, $fetchedObjective->description);
        $this->assertEquals($eventObjective->program_id, $fetchedObjective->program_id);
    }

    /**
     * Test updating an event objective.
     *
     * @return void
     */
    public function test_can_update_event_objective()
    {
        // Create a program
        $program = Program::factory()->create();

        // Create an event objective
        $eventObjective = EventObjectives::create([
            'name' => 'Objective 3',
            'description' => 'This is a description for Objective 3',
            'program_id' => $program->id,
        ]);

        // Update the event objective
        $eventObjective->update([
            'name' => 'Updated Objective 3',
            'description' => 'Updated description for Objective 3',
        ]);

        // Fetch the updated event objective and assert changes
        $updatedObjective = EventObjectives::find($eventObjective->id);
        $this->assertEquals('Updated Objective 3', $updatedObjective->name);
        $this->assertEquals('Updated description for Objective 3', $updatedObjective->description);
    }

    /**
     * Test deleting an event objective.
     *
     * @return void
     */
    public function test_can_delete_event_objective()
    {
        // Create a program
        $program = Program::factory()->create();

        // Create an event objective
        $eventObjective = EventObjectives::create([
            'name' => 'Objective 4',
            'description' => 'This is a description for Objective 4',
            'program_id' => $program->id,
        ]);

        // Delete the event objective
        $eventObjective->delete();

        // Assert the event objective has been deleted
        // $this->assertDatabaseMissing('event_objectives', [
        //     'id' => $eventObjective->id,
        // ]);
        $this->assertDatabaseMissing('event_objectives', [
            'id' => $eventObjective->id,
        ]);
    }
}
