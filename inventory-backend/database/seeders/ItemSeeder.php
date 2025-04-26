<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        Item::create([
            'name' => 'Televisi LED 32 Inch',
            'description' => 'Televisi LED dengan layar 32 inch.',
            'price' => 2500000,
            'stock' => 10, // Tambahkan stok
            'category_id' => 1,
            'supplier_id' => 1,
            'created_by' => 1,
        ]);

        Item::create([
            'name' => 'Kemeja Pria',
            'description' => 'Kemeja pria lengan panjang.',
            'price' => 150000,
            'stock' => 5, // Tambahkan stok
            'category_id' => 2,
            'supplier_id' => 2,
            'created_by' => 2,
        ]);

        Item::create([
            'name' => 'Radio Portabel',
            'description' => 'Radio portabel dengan baterai tahan lama.',
            'price' => 75000,
            'stock' => 3, // Tambahkan stok
            'category_id' => 1,
            'supplier_id' => 1,
            'created_by' => 1,
        ]);
    }
}