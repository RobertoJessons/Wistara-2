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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('id_customer'); // Tambahkan kolom id_customer sebagai primary key
            $table->string('nomor_telepon')->unique(); // nomor_telepon tetap unik tetapi bukan primary key
            $table->string('nama_customer')->unique();
            $table->timestamp('nomor_telepon_verified_at')->nullable();
            $table->string('password');
            $table->integer('poin');
            $table->string('tanggal_mendaftar');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
