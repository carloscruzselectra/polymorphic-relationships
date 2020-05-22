<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_post_has_relationships()
    {
        /** @var Post $post */
        $post = factory(Post::class)->create();

        $this->assertInstanceOf(Post::class, $post);

        $this->assertInstanceOf(User::class, $post->user);
        $this->assertInstanceOf(BelongsTo::class, $post->user());

        $this->assertInstanceOf(Collection::class, $post->comments);
        $this->assertInstanceOf(HasMany::class, $post->comments());
    }
}
