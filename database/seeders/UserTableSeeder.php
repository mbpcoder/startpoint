<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        User::updateOrCreate(['id' => 1], [
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@blog.com',
            'password' => bcrypt('123456'),
            'is_admin' => true,
            'disabled' => false,
            'description' => 'Seed user',
        ]);
    }
}
