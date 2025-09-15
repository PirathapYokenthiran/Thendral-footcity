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
            $table->string('name');
            $table->string('unit')->nullable();     // e.g. 1kg, 500ml
            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable(); // For offers
            $table->string('limit')->nullable();    // e.g. Max 3kg, No limit
            $table->string('category')->nullable(); // rice, oil, veg, cleaning
            $table->string('image')->nullable();    // optional product image
            $table->timestamps();
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
