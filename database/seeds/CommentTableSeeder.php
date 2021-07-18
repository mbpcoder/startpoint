<?php

use Illuminate\Database\Seeder;


class CommentTableSeeder extends Seeder {

    public function run()
    {
        \App\Comment::updateOrCreate([
            'id' => 1,
            'name' => 'Visitor 1',
            'website' => 'Visitor 2',
            'post_id' => 1,
            'body' => 'test comment 1',
            'email' => 'a@.test.com',
        ]);

        \App\Comment::updateOrCreate([
            'id' => 2,
            'name' => 'Visitor 2',
            'website' => 'Visitor 2',
            'post_id' => 1,
            'body' => 'test comment 2',
            'email' => 'b@.test.com',
        ]);
    }
}