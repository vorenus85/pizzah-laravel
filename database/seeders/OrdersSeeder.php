<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create(
        // 1. minta – már kifizetett, sikeresen kézbesített rendelés
            [
                'created_at'       => Carbon::now()->subDays(3),
                'updated_at'       => Carbon::now()->subDays(3),
                'total'            => 2680.00,
                'sub_total'        => 2290.00,
                'payment_status'   => 'paid',
                'delivery_status'  => 'delivered',
                'payment_type'     => 'cod',
                'delivery_type'    => 'home_delivery',
                'delivery_cost'    => 390.00,
                'payment_cost'     => 0,
                'customer_name'    => 'Kiss Péter',
                'customer_email'   => 'peter.kiss@example.com',
                'customer_phone'   => '+36 30 123 4567',
                'customer_address' => '1137 Budapest, Pozsonyi út 10.',
                'customer_note'    => 'Felhívni kézbesítés előtt',
            ],
        );

        Order::create(
        // 2. minta – még folyamatban lévő (payment pending, csomagolás alatt) rendelés
            [
                'created_at'       => Carbon::now()->subDays(2),
                'updated_at'       => Carbon::now()->subDays(2),
                'total'            => 7470.00,
                'sub_total'        => 7470.00,
                'payment_status'   => 'pending',
                'delivery_status'  => 'processing',
                'payment_type'     => 'cod',
                'delivery_type'    => 'home_delivery',
                'delivery_cost'    => 390.00,
                'payment_cost'     => 0,
                'customer_name'    => 'Nagy Eszter',
                'customer_email'   => 'eszter.nagy@example.com',
                'customer_phone'   => '+36 20 987 6543',
                'customer_address' => '9021 Győr, Baross Gábor u. 5.',
                'customer_note'    => 'Kapucsengő: 12',
            ],
        );
    }
}
