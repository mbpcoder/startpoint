<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        Category::updateOrCreate([
            'id' => 1,
            'name' => 'بدون دسته',
            'slug' => 'بدون دسته',
            'disabled' => false
        ]);
    }
}
