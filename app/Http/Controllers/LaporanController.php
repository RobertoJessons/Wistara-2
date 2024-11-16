<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai tanggal awal dan tanggal akhir dari request
        $tanggalAwal = $request->get('tanggal_awal');
        $tanggalAkhir = $request->get('tanggal_akhir');
        $query = TransaksiPenjualan::query();

        // Terapkan filter berdasarkan rentang tanggal jika kedua tanggal tersedia
        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('tanggal_transaksi', [$tanggalAwal, $tanggalAkhir]);
        }

        // Eksekusi query
        $transaksi_penjualan = $query->get();

        // Tampilkan data di view
        return view('laporan.index', compact('transaksi_penjualan'));
    }
}
