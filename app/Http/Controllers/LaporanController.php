<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $transaksi_penjualan = TransaksiPenjualan::all();
        return view('laporan.index', compact('transaksi_penjualan'));
    }
}
