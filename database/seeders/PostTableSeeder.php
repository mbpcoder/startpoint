<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;


class PostTableSeeder extends Seeder
{

    public function run()
    {
        Post::updateOrCreate(['id' => 1], [
            'id' => 1,
            'author_id' => 1,
            'title' => 'test',
            'slug' => 'test',
            'body' => 'test content',
            'published_at' => now()->toDateTimeString(),
        ]);

        Post::updateOrCreate(['id' => 2], [
            'id' => 2,
            'author_id' => 1,
            'title' => 'test2',
            'slug' => 'test2',
            'body' => 'test2 content',
            'published_at' => now()->toDateTimeString(),
        ]);
    }
}
