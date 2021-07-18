<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder {

    public function run()
    {
        \App\User::updateOrCreate([
            'id' => 1
        ],[
            'id' => 1,
            'email' => 'admin@blog.com',
            'name' => 'admin',
            'password' => bcrypt('123456'),
            'disabled' => false,
            'description' => 'Seed user',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}