<?php
namespace Tests\Unit\Post;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_post()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $post = Post::create([
            'image' => 'image.jpg',
            'title' => 'Sample Post',
            'slug' => 'sample-post',
            'content' => 'This is a sample post content.',
            'tags' => ['tag1', 'tag2', 'tag3'],
            'category_id' => $category->id,
            'published' => true,
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Sample Post',
            'slug' => 'sample-post',
            'category_id' => $category->id,
            'published' => 1,
            'user_id' => $user->id,
        ]);

        $savedPost = Post::find($post->id);
        $this->assertEquals(['tag1', 'tag2', 'tag3'], $savedPost->tags);
        $this->assertTrue($savedPost->published);
    }

    /** @test */
    public function it_can_read_a_post()
    {
        $post = Post::factory()->create();

        $retrievedPost = Post::find($post->id);

        $this->assertEquals($post->id, $retrievedPost->id);
        $this->assertEquals($post->title, $retrievedPost->title);
        $this->assertEquals($post->slug, $retrievedPost->slug);
    }

    /** @test */
    public function it_can_update_a_post()
    {
        $post = Post::factory()->create();

        $post->update([
            'title' => 'Updated Title',
            'content' => 'Updated content.',
            'tags' => ['newTag1', 'newTag2'],
            'published' => false,
        ]);

        $this->assertEquals('Updated Title', $post->title);
        $this->assertEquals('Updated content.', $post->content);
        $this->assertEquals(['newTag1', 'newTag2'], $post->tags);
        $this->assertFalse($post->published);
    }

    /** @test */
    public function it_can_delete_a_post()
    {
        $post = Post::factory()->create();

        $post->delete();

        $this->assertModelMissing($post);
    }

    /** @test */
    public function it_has_a_relationship_with_category()
    {
        $category = Category::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Category::class, $post->category);
        $this->assertEquals($category->id, $post->category->id);
    }

    /** @test */
    public function it_has_a_relationship_with_user()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $post->user);
        $this->assertEquals($user->id, $post->user->id);
    }
}
