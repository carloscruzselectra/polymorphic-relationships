<?php

namespace Tests\Feature;

use App\Post;
use App\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_tag_has_relationships()
    {
        /** @var Tag $tag */
        $tag = factory(Tag::class)->create();

        /** @var Post $post */
        $post = factory(Post::class)->create();
        $post->tags()->save($tag);

        $this->assertCount(1, $post->tags);
        $this->assertInstanceOf(BelongsToMany::class, $post->tags());
        $this->assertInstanceOf(Collection::class, $post->tags);

        $this->assertCount(1, $tag->posts);
        $this->assertInstanceOf(BelongsToMany::class, $tag->posts());
        $this->assertInstanceOf(Collection::class, $tag->posts);
    }
}
