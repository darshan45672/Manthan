<?php

namespace Tests\Unit\Gallery;

use App\Models\Gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GalleryCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_gallery()
    {
        $data = [
            'name' => 'Art Gallery',
            'image' => 'art-gallery.jpg',
            'description' => 'A collection of modern art pieces.',
            'meta_description' => 'Modern art gallery.',
            'meta_keywords' => 'art, gallery, modern',
            'meta_title' => 'Art Gallery',
            'gallery_images' => ['image1.jpg', 'image2.jpg'],
            'is_published' => true,
        ];

        $gallery = Gallery::create($data);

        $this->assertDatabaseHas('galleries', [
            'name' => 'Art Gallery',
            'description' => 'A collection of modern art pieces.',
            'is_published' => true,
        ]);
    }

    /** @test */
    public function it_can_read_a_gallery()
    {
        $gallery = Gallery::factory()->create();

        $retrievedGallery = Gallery::find($gallery->id);

        $this->assertEquals($gallery->name, $retrievedGallery->name);
        $this->assertEquals($gallery->description, $retrievedGallery->description);
        $this->assertEquals($gallery->is_published, $retrievedGallery->is_published);
        $this->assertEquals($gallery->gallery_images, $retrievedGallery->gallery_images);
    }

    /** @test */
    public function it_can_update_a_gallery()
    {
        $gallery = Gallery::factory()->create();

        $gallery->update([
            'name' => 'Updated Gallery Name',
            'description' => 'Updated gallery description.',
            'is_published' => false,
        ]);

        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'name' => 'Updated Gallery Name',
            'description' => 'Updated gallery description.',
            'is_published' => false,
        ]);
    }

    /** @test */
    public function it_can_delete_a_gallery()
    {
        $gallery = Gallery::factory()->create();

        $gallery->delete();

        $this->assertDatabaseMissing('galleries', [
            'id' => $gallery->id,
        ]);
    }
}
