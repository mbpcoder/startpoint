<?php

use Illuminate\Database\Seeder;


class PostTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        \Blog\Post::create([
            'id' => 1,
            'title' => 'test',
            'body' => 'test content',
            'user_id' => 1,

        ]);

        \Blog\Post::create([
            'id' => 2,
            'title' => 'test2',
            'body' => 'test2 content',
            'user_id' => 1,

        ]);
    }
}