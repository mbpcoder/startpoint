<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder {

    public function run()
    {
        \StartPoint\User::updateOrCreate([
            'id' => 1,
            'email' => 'admin@blog.com',
            'name' => 'admin',
            'password' => bcrypt('123456'),
        ]);
    }
}