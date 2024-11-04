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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id_user')->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tempat_tinggal');
            $table->string('nama_role'); // Menambahkan kolom nama_role sebagai foreign key
            $table->foreign('nama_role')->references('nama_role')->on('role')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_password_reset_tokens');
    }
};
