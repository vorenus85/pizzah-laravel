<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderItem::create([
            'created_at'       => Carbon::now()->subDays(2),
            'updated_at'       => Carbon::now()->subDays(2),
            'order_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'price' => 2290
        ]);

        OrderItem::create([
            'created_at'       => Carbon::now()->subDays(2),
            'updated_at'       => Carbon::now()->subDays(2),
            'order_id' => 2,
            'product_id' => 2,
            'quantity' => 2,
            'price' => 2590
        ]);

        OrderItem::create([
            'created_at'       => Carbon::now()->subDays(2),
            'updated_at'       => Carbon::now()->subDays(2),
            'order_id' => 2,
            'product_id' => 1,
            'quantity' => 1,
            'price' => 2290
        ]);
    }
}
