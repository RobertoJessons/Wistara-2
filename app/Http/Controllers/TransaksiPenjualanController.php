<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    public function index()
    {
        $transaksi_penjualan = TransaksiPenjualan::all();
        return view('TransaksiPenjualan.index', compact('transaksi_penjualan'));
    }
}
