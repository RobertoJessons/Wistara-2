<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'supplier';

    // Primary Key
    protected $primaryKey = 'id_supplier';
    
    // Disable auto-increment (karena primary key bukan tipe integer)
    public $incrementing = false;
    
    // Tipe primary key yang bukan integer
    protected $keyType = 'string';

    // Field yang bisa diisi secara mass-assignment
    protected $fillable = [
        'id_supplier',
        'nama_supplier',
        'alamat',
        'nomor_telepon_supplier',
    ];

    // Disable timestamps jika tabel tidak memiliki created_at dan updated_at
    public $timestamps = false;
}
