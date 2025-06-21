<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Magyaros',
            'description' => 'Kolbász, bacon, hagyma',
            'price' => 2290,
            'size' => '32 cm',
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Magyaros 2',
            'description' => 'Kolbász, bacon, hagyma',
            'price' => 2290,
            'size' => '32 cm',
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'Magyaros 3',
            'description' => 'Kolbász, bacon, hagyma',
            'price' => 2290,
            'size' => '32 cm',
            'category_id' => 3
        ]);
    }
}
