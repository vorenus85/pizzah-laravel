<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'created_at'       => Carbon::now()->subDays(10),
            'updated_at'       => Carbon::now()->subDays(10),
            'name' => 'Nápolyi pizza',
            'slug' => 'napolyi-pizza',
            'status' => 'on',
            'description' => 'Lorem ipsum dolor',
        ]);

        Category::create([
            'created_at'       => Carbon::now()->subDays(10),
            'updated_at'       => Carbon::now()->subDays(10),
            'name' => 'Chicagoi pizza',
            'slug' => 'chicagoi-pizza',
            'status' => 'on',
            'description' => 'Lorem ipsum dolor',
        ]);

        Category::create([
            'created_at'       => Carbon::now()->subDays(10),
            'updated_at'       => Carbon::now()->subDays(10),
            'name' => 'New yorki pizza',
            'slug' => 'new-yorki-pizza',
            'status' => 'on',
            'description' => 'Lorem ipsum dolor',
        ]);
    }
}
