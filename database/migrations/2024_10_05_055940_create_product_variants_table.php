<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('price')->default(999999999);
            $table->unsignedInteger('price_on_sale')->default(999999999);
            $table->string('image')->default('');

            // Thêm khóa ngoại cho color_id và size_id
            $table->unsignedBigInteger('color_id')->unsigned(); // Khóa ngoại cho color
            $table->unsignedBigInteger('size_id')->unsigned(); // Khóa ngoại cho size

            $table->timestamps();

            // Khóa ngoại cho color
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            // Khóa ngoại cho size
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
