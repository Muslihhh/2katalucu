<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tipe;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Post::factory(50)->recycle([
        //     Tipe::factory(5)->create(),
            User::factory(10)->create();
        // ])->create();
    
    }
}
