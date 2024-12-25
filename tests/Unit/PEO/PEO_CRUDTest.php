<?php

namespace Tests\Unit\ProgramExpectedOutcomes;

use App\Models\ProgramExpectedOutcomes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PEO_CRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_program_expected_outcome()
    {
        $data = [
            'label' => 'Outcome 1',
            'name' => 'Critical Thinking',
            'description' => 'Develop the ability to analyze and evaluate complex problems.',
        ];

        $outcome = ProgramExpectedOutcomes::create($data);

        $this->assertDatabaseHas('program_expected_outcomes', [
            'label' => 'Outcome 1',
            'name' => 'Critical Thinking',
            'description' => 'Develop the ability to analyze and evaluate complex problems.',
        ]);
    }

    /** @test */
    public function it_can_read_a_program_expected_outcome()
    {
        $outcome = ProgramExpectedOutcomes::factory()->create();

        $retrievedOutcome = ProgramExpectedOutcomes::find($outcome->id);

        $this->assertEquals($outcome->label, $retrievedOutcome->label);
        $this->assertEquals($outcome->name, $retrievedOutcome->name);
        $this->assertEquals($outcome->description, $retrievedOutcome->description);
    }

    /** @test */
    public function it_can_update_a_program_expected_outcome()
    {
        $outcome = ProgramExpectedOutcomes::factory()->create();

        $outcome->update([
            'label' => 'Updated Label',
            'name' => 'Updated Name',
            'description' => 'Updated description of the outcome.',
        ]);

        $this->assertDatabaseHas('program_expected_outcomes', [
            'id' => $outcome->id,
            'label' => 'Updated Label',
            'name' => 'Updated Name',
            'description' => 'Updated description of the outcome.',
        ]);
    }

    /** @test */
    public function it_can_delete_a_program_expected_outcome()
    {
        $outcome = ProgramExpectedOutcomes::factory()->create();

        $outcome->delete();

        $this->assertDatabaseMissing('program_expected_outcomes', [
            'id' => $outcome->id,
        ]);
    }
}
