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
        Schema::create('nota_pembelian', function (Blueprint $table) {
            $table->string('id_nota_pembelian')->primary();
            $table->timestamp('tanggal_pembelian');
            $table->string('id_supplier');
            $table->string('nama_supplier');
            $table->string('nama_stok')->unique();
            $table->integer('jumlah_stok');
            $table->integer('harga_stok');
            $table->integer('total_pembelian');
            $table->foreign('id_nota_pembelian')->references('id_transaksi_pembelian')->on('transaksi_pembelian');
            $table->foreign('id_supplier')->references('id_supplier')->on('transaksi_pembelian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_pembelian');
    }
};
