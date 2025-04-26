<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Elektronik',
                'description' => 'Barang-barang elektronik seperti TV, radio, dll.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pakaian',
                'description' => 'Pakaian pria dan wanita.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}