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
        $data = [
            'name' => 'Tech',
            'slug' => 'tech',
            'description' => 'All about technology',
            'color' => '#ff5733',
        ];

        $category = Category::create($data);

        $this->assertDatabaseHas('categories', [
            'name' => 'Tech',
            'slug' => 'tech',
        ]);
    }

    /** @test */
    public function it_can_read_a_category()
    {   
        $category = Category::factory()->create();

        $retrievedCategory = Category::find($category->id);

        $this->assertEquals($category->name, $retrievedCategory->name);
        $this->assertEquals($category->slug, $retrievedCategory->slug);
        $this->assertEquals($category->description, $retrievedCategory->description);
        $this->assertEquals($category->color, $retrievedCategory->color);
    }

    /** @test */
    public function it_can_update_a_category()
    {
        $category = Category::factory()->create();

        $category->update([
            'name' => 'Updated Tech',
            'color' => '#4287f5',
        ]);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Updated Tech',
            'color' => '#4287f5',
        ]);
    }

    /** @test */
    public function it_can_delete_a_category()
    {
        $category = Category::factory()->create();

        $category->delete();

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }
}
