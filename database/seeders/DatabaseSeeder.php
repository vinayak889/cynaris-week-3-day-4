<?php
namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Post::factory()
            ->count(20)
            ->create()
            ->each(function ($post) {
                Comment::factory()->count(3)->create([
                    'post_id' => $post->id,
                ]);
            });
    }
}
