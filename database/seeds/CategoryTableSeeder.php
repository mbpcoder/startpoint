<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        \StartPoint\Category::updateOrCreate([
            'id' => 1,
            'name' => 'بدون دسته',
            'alias' => 'بدون دسته',
            'published' => false,
            'user_id' => 1,
        ]);
    }
}
