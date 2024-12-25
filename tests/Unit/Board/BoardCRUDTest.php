<?php

namespace Tests\Unit\Board;

use App\Models\Board;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoardCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_board()
    {
        $data = [
            'name' => 'Tech Board',
            'description' => 'Board for technical initiatives',
            'is_active' => true,
        ];

        $board = Board::create($data);

        $this->assertDatabaseHas('boards', [
            'name' => 'Tech Board',
            'description' => 'Board for technical initiatives',
            'is_active' => true,
        ]);
    }

    /** @test */
    public function it_can_read_a_board()
    {
        $board = Board::factory()->create();

        $retrievedBoard = Board::find($board->id);

        $this->assertEquals($board->name, $retrievedBoard->name);
        $this->assertEquals($board->description, $retrievedBoard->description);
        $this->assertEquals($board->is_active, $retrievedBoard->is_active);
    }

    /** @test */
    public function it_can_update_a_board()
    {
        $board = Board::factory()->create();

        $board->update([
            'name' => 'Updated Board Name',
            'description' => 'Updated description',
            'is_active' => false,
        ]);

        $this->assertDatabaseHas('boards', [
            'id' => $board->id,
            'name' => 'Updated Board Name',
            'description' => 'Updated description',
            'is_active' => false,
        ]);
    }

    /** @test */
    public function it_can_delete_a_board()
    {
        $board = Board::factory()->create();

        $board->delete();

        $this->assertDatabaseMissing('boards', [
            'id' => $board->id,
        ]);
    }
}
