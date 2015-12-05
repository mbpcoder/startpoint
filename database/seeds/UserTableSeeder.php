<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        \Blog\User::create([
            'id' => 1,
            'email' => 'admin@blog.com',
            'name' => 'admin',
            'password' => bcrypt('123456'),
        ]);
    }
}