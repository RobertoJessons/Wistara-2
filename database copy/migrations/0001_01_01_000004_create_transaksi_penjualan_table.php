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
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->string('nomor_transaksi_penjualan')->primary()->unique();
            $table->timestamp('tanggal_transaksi');
            $table->string('id_produk');
            $table->string('nama_produk');
            $table->integer('harga_produk');
            $table->integer('jumlah_produk');
            $table->integer('total_harga');
            $table->string('nama_customer');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualan');
    }
};
