<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('total'); // ordered items + delivery cost + purchase cost
            $table->float('sub_total'); // only ordered items
            $table->enum('payment_status',['pending', 'paid', 'failed', 'expired', 'refunded', 'partially_refunded', 'cancelled'])->default('pending');
            $table->enum('delivery_status', ['pending', 'shipped', 'processing', 'delivered', 'cancelled'])->default('pending');
            $table->enum('payment_type', ['cod'])->default('cod');
            $table->enum('delivery_type', ['home_delivery'])->default('home_delivery');
            $table->float('delivery_cost')->nullable();
            $table->float('payment_cost')->nullable();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->string('customer_note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
