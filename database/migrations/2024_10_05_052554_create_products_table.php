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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string('description')->nullable()->default('');
            $table->unsignedTinyInteger('start')->default(5);
            $table->string('image')->nullable()->default('');
            $table->unsignedBigInteger('category_id')->unsigned(); // Khóa ngoại cho category
            $table->unsignedBigInteger('brand_id')->unsigned(); // Khóa ngoại cho brand
            $table->timestamps();

            // Khóa ngoại cho category
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Khóa ngoại cho brand
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
