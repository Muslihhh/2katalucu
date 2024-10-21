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
        ]);

        Category::create([
            'name' => 'Pakaian',
        ]);
        
        Category::create([
            'name' => 'Makanan',
        ]);
    }
}
