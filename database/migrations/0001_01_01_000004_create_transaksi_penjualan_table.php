<?php

use App\Models\Customer;
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
            $table->id();
            $table->string('nomor_transaksi_penjualan');
            $table->timestamp('tanggal_transaksi');
            $table->string('id_produk');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('jumlah_produk');
            $table->integer('total_harga');
            $table->string('id_customer'); 
            $table->boolean('tukar_poin')->default(false);
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->foreign('id_customer')->references('id_customer')->on('customer');
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
