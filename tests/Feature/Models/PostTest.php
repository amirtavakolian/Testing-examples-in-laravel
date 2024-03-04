<?php

namespace Models;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    public function testInsertPost(): void
    {
        $post = Post::factory()->create()->toArray();
        $this->assertDatabaseHas(Post::class, $post);
    }

    public function testInsertPost2()
    {
        $post = Post::factory()->create()->toArray();
        $this->assertDatabaseCount(Post::class, 1);
    }

    public function testInsertPost3()
    {
        $post = Post::factory()->make()->toArray();
        Post::create($post);
        $this->assertDatabaseHas(Post::class, $post);
    }
}
