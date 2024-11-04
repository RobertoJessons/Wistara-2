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
        Schema::create('stok', function (Blueprint $table) {
            $table->string('id_stok')->primary()->unique();
            $table->string('nama_stok')->unique();
            $table->timestamp('tanggal_pembelian');
            $table->integer('kuantitas');
            $table->foreign('nama_stok')->references('nama_stok')->on('transaksi_pembelian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
