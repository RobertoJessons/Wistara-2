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
            $table->string('nomor_telepon')->primary()->unique();
            $table->string('nama_customer')->unique();
            $table->timestamp('nomor_telepon_verified_at')->nullable();
            $table->string('password');
            $table->integer('poin');
            $table->string('tanggal_mendaftar');
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
