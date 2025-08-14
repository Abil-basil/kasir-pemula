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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('PenjualanID')->references('id')->on('penjualans')->onDelete('set null');
            $table->foreignId('PenjualanID')->constrained(
                table: 'penjualans',
                indexName:'detail_penjualan_penjualan_id'
            );
            $table->foreignId('ProdukID')->constrained(
                table: 'produks',
                indexName: 'detail_penjualan_produk_id'
            );
            $table->integer('JumlahProduk');
            $table->decimal('Subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
