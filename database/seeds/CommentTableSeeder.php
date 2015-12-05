<?php

use Illuminate\Database\Seeder;


class CommentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('comments')->delete();

        \Blog\Comment::create([
            'id' => 1,
            'post_id' => 1,
            'content' => 'test comment 1',
            'email' => 'a@.test.com',
        ]);

        \Blog\Comment::create([
            'id' => 2,
            'post_id' => 1,
            'content' => 'test comment 2',
            'email' => 'b@.test.com',
        ]);
    }
}