<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPembelian;
use Illuminate\Http\Request;

class TransaksiPembelianController extends Controller
{
    public function index()
    {
        $transaksi_pembelian = TransaksiPembelian::all();
        return view('TransaksiPembelian.index', compact('transaksi_pembelian'));
    }
}
