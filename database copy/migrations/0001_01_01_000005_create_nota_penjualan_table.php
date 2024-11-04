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
        Schema::create('nota_penjualan', function (Blueprint $table) {
            $table->string('id_nota_penjualan')->primary()->unique();
            $table->timestamp('tanggal_transaksi');
            $table->string('id_produk');
            $table->string('nama_produk');
            $table->string('harga_produk');
            $table->string('jumlah_produk');
            $table->integer('total_harga');
            $table->foreign('id_nota_penjualan')->references('nomor_transaksi_penjualan')->on('transaksi_penjualan');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_penjualan');
    }
};
