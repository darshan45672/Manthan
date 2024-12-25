<?php

namespace Tests\Unit\BoardPresidents;

use App\Models\Board;
use App\Models\User;
use App\Models\BoardPresidents;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoardPresidentsCRUDTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a board president.
     *
     * @return void
     */
    public function test_can_create_board_president()
    {
        // Create a user and a board for the president to belong to
        $user = User::factory()->create();
        $board = Board::factory()->create();

        // Create a board president and assert its creation
        $boardPresident = BoardPresidents::create([
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);

        $this->assertDatabaseHas('board_presidents', [
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);
    }

    /**
     * Test reading a board president.
     *
     * @return void
     */
    public function test_can_read_board_president()
    {
        // Create a user and a board for the president to belong to
        $user = User::factory()->create();
        $board = Board::factory()->create();

        // Create a board president
        $boardPresident = BoardPresidents::create([
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);

        // Fetch the board president from the database
        $fetchedPresident = BoardPresidents::find($boardPresident->id);

        $this->assertEquals($boardPresident->id, $fetchedPresident->id);
        $this->assertEquals($boardPresident->user_id, $fetchedPresident->user_id);
        $this->assertEquals($boardPresident->board_id, $fetchedPresident->board_id);
    }

    /**
     * Test updating a board president.
     *
     * @return void
     */
    public function test_can_update_board_president()
    {
        // Create a user and a board for the president to belong to
        $user = User::factory()->create();
        $board = Board::factory()->create();

        // Create a board president
        $boardPresident = BoardPresidents::create([
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);

        // Update the board president
        $newBoard = Board::factory()->create();
        $boardPresident->update([
            'board_id' => $newBoard->id,
        ]);

        // Fetch the updated board president and assert changes
        $updatedPresident = BoardPresidents::find($boardPresident->id);
        $this->assertEquals($newBoard->id, $updatedPresident->board_id);
    }

    /**
     * Test deleting a board president.
     *
     * @return void
     */
    public function test_can_delete_board_president()
    {
        // Create a user and a board for the president to belong to
        $user = User::factory()->create();
        $board = Board::factory()->create();

        // Create a board president
        $boardPresident = BoardPresidents::create([
            'user_id' => $user->id,
            'board_id' => $board->id,
        ]);

        // Delete the board president
        $boardPresident->delete();

        // Assert the board president has been deleted
        $this->assertModelMissing($boardPresident);
        $this->assertDatabaseMissing('board_presidents', [
            'id' => $boardPresident->id,
        ]);
    }
}
