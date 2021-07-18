<?php

use Illuminate\Database\Seeder;


class PostTableSeeder extends Seeder {

    public function run()
    {
        \App\Post::updateOrCreate([
            'id' => 1,
            'title' => 'test',
            'alias' => 'test',
            'body' => 'test content',
            'user_id' => 1,
        ]);

        \App\Post::updateOrCreate([
            'id' => 2,
            'title' => 'test2',
            'alias' => 'test2',
            'body' => 'test2 content',
            'user_id' => 1,

        ]);
    }
}