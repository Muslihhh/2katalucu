<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Elektronik',
            'daerah' => 'Jakarta',  // Daerah yang sesuai
        ]);

        Category::create([
            'name' => 'Pakaian',
            'daerah' => 'Yogyakarta',
        ]);

        Category::create([
            'name' => 'Makanan',
            'daerah' => 'Surabaya',
        ]);
    }
}
