<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok';
    protected $primaryKey = 'id_stok';
    public $incrementing = false; // Karena id_stok adalah string

    protected $fillable = ['id_stok', 'nama_stok', 'tanggal_pembelian', 'kuantitas'];

    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan
}
