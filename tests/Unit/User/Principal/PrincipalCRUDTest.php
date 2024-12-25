<?php

namespace Tests\Unit\Principal;

use App\Models\Principal;
use App\Models\User;
use App\Models\College;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PrincipalCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_principal()
    {
        $user = User::factory()->create();
        $college = College::factory()->create();

        $principal = Principal::create([
            'user_id' => $user->id,
            'college_id' => $college->id,
            'qualification' => ['PhD in Education'],
            'specialization' => ['Educational Management'],
            'experience' => 20,
            'joining_date' => '2015-06-15',
        ]);

        // Assert the record exists in the database
        $this->assertDatabaseHas('principals', [
            'user_id' => $user->id,
            'college_id' => $college->id,
            'experience' => 20,
            'joining_date' => '2015-06-15',
        ]);

        // Assert array fields are cast correctly
        $savedPrincipal = Principal::find($principal->id);
        $this->assertEquals(['PhD in Education'], $savedPrincipal->qualification);
        $this->assertEquals(['Educational Management'], $savedPrincipal->specialization);
    }

    /** @test */
    public function it_can_read_a_principal()
    {
        $principal = Principal::factory()->create();

        $retrievedPrincipal = Principal::find($principal->id);

        $this->assertEquals($principal->id, $retrievedPrincipal->id);
        $this->assertEquals($principal->experience, $retrievedPrincipal->experience);
        // $this->assertEquals($principal->joining_date, $retrievedPrincipal->joining_date);
    }

    /** @test */
    public function it_can_update_a_principal()
    {
        $principal = Principal::factory()->create();

        $principal->update([
            'qualification' => ['MSc in Education'],
            'specialization' => ['Curriculum Development'],
            'experience' => 25,
        ]);

        $this->assertEquals(['MSc in Education'], $principal->qualification);
        $this->assertEquals(['Curriculum Development'], $principal->specialization);
        $this->assertEquals(25, $principal->experience);
    }

    /** @test */
    public function it_can_delete_a_principal()
    {
        $principal = Principal::factory()->create();

        $principal->delete();

        $this->assertModelMissing($principal);
    }

    /** @test */
    public function it_has_a_relationship_with_user()
    {
        $user = User::factory()->create();
        $principal = Principal::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $principal->user);
        $this->assertEquals($user->id, $principal->user->id);
    }

    /** @test */
    public function it_has_a_relationship_with_college()
    {
        $college = College::factory()->create();
        $principal = Principal::factory()->create(['college_id' => $college->id]);

        $this->assertInstanceOf(College::class, $principal->college);
        $this->assertEquals($college->id, $principal->college->id);
    }
}
