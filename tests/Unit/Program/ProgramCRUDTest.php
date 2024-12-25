<?php

namespace Tests\Unit\Program;

use App\Models\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProgramCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_program()
    {
        $data = [
            'banner' => 'banner.jpg',
            'name' => 'Tech Conference',
            'description' => 'A conference on emerging technologies',
            'type' => 'Conference',
            'start_date' => now(),
            'end_date' => now()->addDay(),
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'duration' => '8 hours',
            'fees' => 100.00,
            'location' => 'Tech Park',
            'is_featured' => true,
            'address' => '123 Tech Street',
            'requires_registration' => true,
            'venue' => 'Main Hall',
        ];

        $program = Program::create($data);

        $this->assertDatabaseHas('programs', [
            'name' => 'Tech Conference',
            'type' => 'Conference',
            'is_featured' => true,
            'requires_registration' => true,
        ]);
    }

    /** @test */
    public function it_can_read_a_program()
    {
        $program = Program::factory()->create();

        $retrievedProgram = Program::find($program->id);

        $this->assertEquals($program->name, $retrievedProgram->name);
        $this->assertEquals($program->description, $retrievedProgram->description);
        $this->assertEquals($program->type, $retrievedProgram->type);
        $this->assertEquals($program->fees, $retrievedProgram->fees);
    }

    /** @test */
    public function it_can_update_a_program()
    {
        $program = Program::factory()->create();

        $program->update([
            'name' => 'Updated Program Name',
            'fees' => 150.00,
        ]);

        $this->assertDatabaseHas('programs', [
            'id' => $program->id,
            'name' => 'Updated Program Name',
            'fees' => 150.00,
        ]);
    }

    /** @test */
    public function it_can_delete_a_program()
    {
        $program = Program::factory()->create();

        $program->delete();

        $this->assertDatabaseMissing('programs', [
            'id' => $program->id,
        ]);
    }
}
