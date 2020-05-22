<?php

namespace Tests\Feature;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_comment_has_relationships()
    {
        /** @var Comment $comment */
        $comment = factory(Comment::class)->create();

        $this->assertInstanceOf(Comment::class, $comment);

        $this->assertInstanceOf(User::class, $comment->user);
        $this->assertInstanceOf(BelongsTo::class, $comment->user());

        $this->assertInstanceOf(Post::class, $comment->post);
        $this->assertInstanceOf(BelongsTo::class, $comment->post());
    }
}
