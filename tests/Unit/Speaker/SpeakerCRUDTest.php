<?php

namespace Tests\Unit;

use App\Models\Speakers;
use App\Models\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SpeakerCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_speaker()
    {
        $program = Program::factory()->create();

        $speaker = Speakers::create([
            'image' => 'image_path.jpg',
            'name' => 'John Doe',
            'designation' => 'Tech Lead',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'linkedin' => 'https://linkedin.com/in/johndoe',
            'instagram' => 'https://instagram.com/johndoe',
            'twitter' => 'https://twitter.com/johndoe',
            'program_id' => $program->id,
        ]);

        $this->assertDatabaseHas('speakers', [
            'name' => 'John Doe',
            'designation' => 'Tech Lead',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'linkedin' => 'https://linkedin.com/in/johndoe',
            'instagram' => 'https://instagram.com/johndoe',
            'twitter' => 'https://twitter.com/johndoe',
            'program_id' => $program->id,
        ]);
    }

    /** @test */
    public function it_can_read_a_speaker()
    {
        $speaker = Speakers::factory()->create();

        $retrievedSpeaker = Speakers::find($speaker->id);

        $this->assertEquals($speaker->id, $retrievedSpeaker->id);
        $this->assertEquals($speaker->name, $retrievedSpeaker->name);
    }

    /** @test */
    public function it_can_update_a_speaker()
    {
        $speaker = Speakers::factory()->create();

        $speaker->update([
            'name' => 'Jane Doe',
            'designation' => 'Senior Engineer',
            'twitter' => 'https://twitter.com/janedoe',
        ]);

        $this->assertEquals('Jane Doe', $speaker->name);
        $this->assertEquals('Senior Engineer', $speaker->designation);
        $this->assertEquals('https://twitter.com/janedoe', $speaker->twitter);
    }

    /** @test */
    public function it_can_delete_a_speaker()
    {
        $speaker = Speakers::factory()->create();

        $speaker->delete();

        $this->assertModelMissing($speaker);
    }

    /** @test */
    // public function it_has_a_relationship_with_programs()
    // {
    //     $speaker = Speakers::factory()->create();
    //     $programs = Program::factory()->count(3)->create(['speakers_id' => $speaker->id]);

    //     $this->assertCount(3, $speaker->programs);
    //     $this->assertInstanceOf(Program::class, $speaker->programs->first());
    // }

}

