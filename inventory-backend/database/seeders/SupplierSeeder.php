<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'PT Supplier Jaya',
                'contact_info' => '08123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CV Maju Bersama',
                'contact_info' => '087654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}