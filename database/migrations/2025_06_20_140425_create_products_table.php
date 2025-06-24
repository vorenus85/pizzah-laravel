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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('status', ['on', 'off'])->default('off');
            $table->string('slug', 100)->unique();
            $table->string('name', 100)->unique();
            $table->text('description');
            $table->float('price');
            $table->float('discount_price')->nullable();
            $table->unsignedBigInteger('category_id');

            // foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
