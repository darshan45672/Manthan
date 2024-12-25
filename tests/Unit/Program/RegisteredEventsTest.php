<?php
namespace Tests\Unit;

use App\Models\RegisteredEvents;
use App\Models\User;
use App\Models\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisteredEventsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_registered_event()
    {
        $user = User::factory()->create();
        $program = Program::factory()->create();

        $registeredEvent = RegisteredEvents::create([
            'user_id' => $user->id,
            'program_id' => $program->id,
            'registration_date' => '2024-12-01',
            'is_paid' => true,
            'is_attended' => false,
        ]);

        // Assert the record exists in the database
        $this->assertDatabaseHas('registered_events', [
            'user_id' => $user->id,
            'program_id' => $program->id,
            'registration_date' => '2024-12-01',
            'is_paid' => true,
            'is_attended' => false,
        ]);
    }

    /** @test */
    public function it_can_read_a_registered_event()
    {
        $registeredEvent = RegisteredEvents::factory()->create();

        $retrievedEvent = RegisteredEvents::find($registeredEvent->id);

        $this->assertEquals($registeredEvent->id, $retrievedEvent->id);
        $this->assertEquals($registeredEvent->user_id, $retrievedEvent->user_id);
        $this->assertEquals($registeredEvent->program_id, $retrievedEvent->program_id);
        // $this->assertEquals($registeredEvent->registration_date, $retrievedEvent->registration_date);
    }

    /** @test */
    public function it_can_update_a_registered_event()
    {
        $registeredEvent = RegisteredEvents::factory()->create();

        $registeredEvent->update([
            'is_paid' => false,
            'is_attended' => true,
        ]);

        $this->assertFalse($registeredEvent->is_paid);
        $this->assertTrue($registeredEvent->is_attended);
    }

    /** @test */
    public function it_can_delete_a_registered_event()
    {
        $registeredEvent = RegisteredEvents::factory()->create();

        $registeredEvent->delete();

        $this->assertModelMissing($registeredEvent);
    }

    /** @test */
    public function it_has_a_relationship_with_user()
    {
        $user = User::factory()->create();
        $registeredEvent = RegisteredEvents::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $registeredEvent->user);
        $this->assertEquals($user->id, $registeredEvent->user->id);
    }

    /** @test */
    public function it_has_a_relationship_with_program()
    {
        $program = Program::factory()->create();
        $registeredEvent = RegisteredEvents::factory()->create(['program_id' => $program->id]);

        $this->assertInstanceOf(Program::class, $registeredEvent->program);
        $this->assertEquals($program->id, $registeredEvent->program->id);
    }
}
