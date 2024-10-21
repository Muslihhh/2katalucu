<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Daerah;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data daerah tanpa deskripsi
        Daerah::create([
            'nama_daerah' => 'Jakarta',
        ]);

        Daerah::create([
            'nama_daerah' => 'Bandung',
        ]);

        Daerah::create([
            'nama_daerah' => 'Surabaya',
        ]);

        // Anda bisa menambahkan data lainnya di sini
    }
}
