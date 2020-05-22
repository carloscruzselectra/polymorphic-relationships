<?php

namespace Tests\Feature;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
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

        /** @var Tag $tag */
        $tag = factory(Tag::class)->create();

        $post->tags()->save($tag);

        $this->assertInstanceOf(Post::class, $post);

        $this->assertInstanceOf(User::class, $post->user);
        $this->assertInstanceOf(BelongsTo::class, $post->user());

        $this->assertInstanceOf(Collection::class, $post->comments);
        $this->assertInstanceOf(HasMany::class, $post->comments());

        $this->assertInstanceOf(Collection::class, $post->tags);
        $this->assertInstanceOf(MorphToMany::class, $post->tags());

        $this->assertInstanceOf(Collection::class, $tag->posts);
        $this->assertInstanceOf(BelongsToMany::class, $tag->posts());
    }
}
