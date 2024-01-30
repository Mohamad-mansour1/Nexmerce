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
            $table->string('product_name')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_slug')->nullable();
            $table->string('product_new')->nullable();
            $table->string('product_featured')->nullable();
            $table->string('status')->default(1);
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('special_price')->nullable();
            $table->string('quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
