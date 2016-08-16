<?php

use Illuminate\Database\Seeder;


class PostTableSeeder extends Seeder {

    public function run()
    {
        \StartPoint\Post::updateOrCreate([
            'id' => 1,
            'title' => 'test',
            'body' => 'test content',
            'user_id' => 1,
        ]);

        \StartPoint\Post::updateOrCreate([
            'id' => 2,
            'title' => 'test2',
            'body' => 'test2 content',
            'user_id' => 1,

        ]);
    }
}