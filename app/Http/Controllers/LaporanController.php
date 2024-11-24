<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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

    public function download(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');
    
        // Validasi: jika tanggal awal atau tanggal akhir tidak diinputkan
        if (!$tanggalAwal || !$tanggalAkhir) {
            return redirect()->route('laporan.index')
                ->with('error', 'Harap masukkan tanggal awal dan tanggal akhir untuk mendownload laporan.');
        }
    
        // Ambil data berdasarkan tanggal yang diinputkan
        $laporan = TransaksiPenjualan::whereBetween('tanggal_transaksi', [$tanggalAwal, $tanggalAkhir])
            ->get();
    
        // Jika tidak ada data, berikan pesan peringatan
        if ($laporan->isEmpty()) {
            return redirect()->route('laporan.index')
                ->with('warning', 'Tidak ada data laporan untuk rentang tanggal yang dipilih.');
        }
    
        // Buat file CSV
        $csvData = "Nomor Transaksi,Tanggal Transaksi,Nama Produk,Harga Produk,Jumlah Produk,Total Harga,Nama Customer\n";
    
        foreach ($laporan as $item) {
            $csvData .= sprintf(
                "%s,%s,%s,%s,%s,%s,%s\n",
                $item->nomor_transaksi_penjualan,
                $item->tanggal_transaksi,
                $item->nama_produk,
                $item->harga,
                $item->jumlah_produk,
                $item->total_harga,
                $item->customer->nama_customer
            );
        }
    
        $fileName = "laporan_" . now()->format('Y-m-d_H-i-s') . ".csv";
    
        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ]);
    }    
}
