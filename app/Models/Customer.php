<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan oleh model ini
    protected $table = 'customer';
    protected $primaryKey = 'id_customer'; // Ubah primary key menjadi id_customer
    public $incrementing = true; // Pastikan incrementing diaktifkan jika id_customer adalah auto-increment
    protected $keyType = 'int'; // Set tipe primary key menjadi integer

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'id_customer',
        'nomor_telepon',
        'nama_customer',
        'nomor_telepon_verified_at',
        'password',
        'poin',
        'tanggal_mendaftar',
    ];

    // Tentukan kolom yang harus diabaikan dari mass assignment
    protected $guarded = [];
}
