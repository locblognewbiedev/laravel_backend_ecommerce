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
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('brand_id')->unsigned();
            $table->string('expiry_date')->nullable()->default('');
            $table->unsignedInteger('remaining_quantity')->default(0);
            $table->unsignedInteger('sold')->default(0);
            $table->unsignedTinyInteger('status')->default(1);

            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
