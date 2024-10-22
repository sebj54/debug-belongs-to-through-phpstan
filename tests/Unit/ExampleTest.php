<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Country;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_country_relation(): void
    {
        $country = Country::factory()->create();
        $user = User::factory()
            ->for($country)
            ->create();

        $post = Post::factory()
            ->for($user)
            ->create();

        $this->assertEquals($country->id, $post->country->id);
    }

    public function test_comment_country_relation(): void
    {
        $country = Country::factory()->create();
        $user = User::factory()
            ->for($country)
            ->create();

        $post = Post::factory()
            ->for($user)
            ->create();

        $comment = Comment::factory()
            ->for($post)
            ->for($user)
            ->create();

        $this->assertEquals($country->id, $comment->country->id);
    }
}
