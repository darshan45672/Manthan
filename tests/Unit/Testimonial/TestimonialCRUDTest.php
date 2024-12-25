<?php
namespace Tests\Unit;

use App\Models\Testimonials;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestimonialCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_testimonial()
    {
        $user = User::factory()->create();

        $testimonial = Testimonials::create([
            'user_id' => $user->id,
            'title' => 'Great Service',
            'testimonial' => 'The service was excellent and exceeded expectations.',
            'is_published' => true,
        ]);

        $this->assertDatabaseHas('testimonials', [
            'user_id' => $user->id,
            'title' => 'Great Service',
            'testimonial' => 'The service was excellent and exceeded expectations.',
            'is_published' => true,
        ]);
    }

    /** @test */
    public function it_can_read_a_testimonial()
    {
        $testimonial = Testimonials::factory()->create();

        $retrievedTestimonial = Testimonials::find($testimonial->id);

        $this->assertEquals($testimonial->id, $retrievedTestimonial->id);
        $this->assertEquals($testimonial->title, $retrievedTestimonial->title);
        $this->assertEquals($testimonial->testimonial, $retrievedTestimonial->testimonial);
        $this->assertEquals($testimonial->is_published, $retrievedTestimonial->is_published);
    }

    /** @test */
    public function it_can_update_a_testimonial()
    {
        $testimonial = Testimonials::factory()->create();

        $testimonial->update([
            'title' => 'Updated Title',
            'testimonial' => 'Updated testimonial content.',
            'is_published' => false,
        ]);

        $this->assertDatabaseHas('testimonials', [
            'id' => $testimonial->id,
            'title' => 'Updated Title',
            'testimonial' => 'Updated testimonial content.',
            'is_published' => false,
        ]);
    }

    /** @test */
    public function it_can_delete_a_testimonial()
    {
        $testimonial = Testimonials::factory()->create();

        $testimonial->delete();

        $this->assertModelMissing($testimonial);
    }

    /** @test */
    public function it_has_a_relationship_with_user()
    {
        $user = User::factory()->create();
        $testimonial = Testimonials::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $testimonial->user);
        $this->assertEquals($user->id, $testimonial->user->id);
    }
}
