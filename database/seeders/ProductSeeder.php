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
            'name' => 'Bolognese',
            'slug' => 'bolognese',
            'status' => 'on',
            'description' => '(bolognai ragu, mozzarella)',
            'price' => 2290,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Detroit Classic',
            'slug' => 'detroit-classic',
            'status' => 'on',
            'description' => 'Detroiti vastag pizzatészta, paradicsomszósz, szalámi, mozzarella',
            'price' => 2590,
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'Dolce Vita',
            'slug' => 'dolce-vita',
            'status' => 'on',
            'description' => '(paradicsomszósz, sonka, gomba, kukorica, mozzarella)',
            'price' => 3750,
            'category_id' => 3
        ]);
    }
}
