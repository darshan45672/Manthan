<?php

namespace Tests\Unit\Category;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_category()
    {
        // Prepare the data
        $data = [
            'name' => 'Tech',
            'slug' => 'tech',
            'description' => 'All about technology',
            'color' => '#ff5733',
        ];

        // Create a new category
        $category = Category::create($data);

        // Assert the category was created successfully
        $this->assertDatabaseHas('categories', [
            'name' => 'Tech',
            'slug' => 'tech',
        ]);
    }

    /** @test */
    public function it_can_read_a_category()
    {
        // Create a category
        $category = Category::factory()->create();

        // Retrieve the category from the database
        $retrievedCategory = Category::find($category->id);

        // Assert the category data is correct
        $this->assertEquals($category->name, $retrievedCategory->name);
        $this->assertEquals($category->slug, $retrievedCategory->slug);
        $this->assertEquals($category->description, $retrievedCategory->description);
        $this->assertEquals($category->color, $retrievedCategory->color);
    }

    /** @test */
    public function it_can_update_a_category()
    {
        // Create a category
        $category = Category::factory()->create();

        // Update the category's data
        $category->update([
            'name' => 'Updated Tech',
            'color' => '#4287f5',
        ]);

        // Assert the category was updated in the database
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Updated Tech',
            'color' => '#4287f5',
        ]);
    }

    /** @test */
    public function it_can_delete_a_category()
    {
        // Create a category
        $category = Category::factory()->create();

        // Delete the category
        $category->delete();

        // Assert the category was deleted
        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }
}
