<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;


class CommentTableSeeder extends Seeder
{

    public function run()
    {
        Comment::updateOrCreate(['id' => 1], [
            'id' => 1,
            'post_id' => 1,
            'author_id' => 1,
            'body' => 'test comment 1',
            'published_at' => now()->toDateTimeString(),
        ]);

        Comment::updateOrCreate(['id' => 2], [
            'id' => 2,
            'post_id' => 2,
            'author_id' => 1,
            'body' => 'test comment 2',
            'published_at' => now()->toDateTimeString(),
        ]);
    }
}
