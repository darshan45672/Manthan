<?php

namespace Tests\Unit;

use App\Models\Board;
use App\Models\User;
use App\Models\BoardMembers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoardMembersCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_board_member()
    {
        $user = User::factory()->create();
        $board = Board::factory()->create();

        $boardMember = BoardMembers::create([
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);

        $this->assertDatabaseHas('board_members', [
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);
    }

    /** @test */
    public function it_can_read_a_board_member()
    {
        $user = User::factory()->create();
        $board = Board::factory()->create();
        $boardMember = BoardMembers::create([
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);

        $retrievedBoardMember = BoardMembers::find($boardMember->id);

        $this->assertEquals($user->id, $retrievedBoardMember->user_id);
        $this->assertEquals($board->id, $retrievedBoardMember->board_id);
    }

    /** @test */
    public function it_can_update_a_board_member()
    {
        $user = User::factory()->create();
        $board = Board::factory()->create();
        $boardMember = BoardMembers::create([
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);

        $newBoard = Board::factory()->create(); 
        $boardMember->update([
            'board_id' => $newBoard->id,
        ]);

        $this->assertDatabaseHas('board_members', [
            'id' => $boardMember->id,
            'board_id' => $newBoard->id,
        ]);
    }

    /** @test */
    public function it_can_delete_a_board_member()
    {
        $user = User::factory()->create();
        $board = Board::factory()->create();
        $boardMember = BoardMembers::create([
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);

        $boardMember->delete();
        
        $this->assertDatabaseMissing('board_members', [
            'id' => $boardMember->id,
        ]);
    }
}
