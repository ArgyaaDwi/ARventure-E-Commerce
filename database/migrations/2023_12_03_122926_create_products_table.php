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
            $table->unsignedBigInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('cascade');
            $table->string('product_name');
            $table->string('description');
            $table->string('product_image')->nullable();
            $table->decimal('harga', 10, 2); // Angka 10, 2 menunjukkan total digit dan digit di belakang koma
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('stock')->default(0);
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
