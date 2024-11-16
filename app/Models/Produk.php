<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $incrementing = false; // Since id_produk is a string

    public $timestamps = false;

    protected $fillable = ['id_produk', 'nama_produk', 'jenis_produk', 'harga'];
}
