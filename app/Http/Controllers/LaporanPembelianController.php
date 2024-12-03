<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LaporanPembelianController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai tanggal awal dan tanggal akhir dari request
        $tanggalAwal = $request->get('tanggal_awal');
        $tanggalAkhir = $request->get('tanggal_akhir');
        $query = TransaksiPembelian::query();

        // Terapkan filter berdasarkan rentang tanggal jika kedua tanggal tersedia
        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('tanggal_pembelian', [$tanggalAwal, $tanggalAkhir]);
        }

        // Eksekusi query untuk mendapatkan data transaksi pembelian
        $transaksi_pembelian = $query->get();

        // Tampilkan data di view
        return view('laporan.pembelian', compact('transaksi_pembelian'));
    }

    public function download(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');
        
        // Validasi: jika tanggal awal atau tanggal akhir tidak diinputkan
        if (!$tanggalAwal || !$tanggalAkhir) {
            return redirect()->route('laporan.pembelian.index')
                ->with('error', 'Harap masukkan tanggal awal dan tanggal akhir untuk mendownload laporan.');
        }

        // Ambil data berdasarkan rentang tanggal yang dipilih
        $laporan = TransaksiPembelian::whereBetween('tanggal_pembelian', [$tanggalAwal, $tanggalAkhir])->get();

        // Jika tidak ada data, berikan pesan peringatan
        if ($laporan->isEmpty()) {
            return redirect()->route('laporan.pembelian.index')
                ->with('warning', 'Tidak ada data laporan untuk rentang tanggal yang dipilih.');
        }

        // Buat file CSV
        $csvData = "Nomor Transaksi Pembelian,Tanggal Pembelian,Nama Produk,Harga Pembelian,Jumlah Pembelian,Total Pembelian,Nama Supplier\n";

        foreach ($laporan as $item) {
            $csvData .= sprintf(
                "%s,%s,%s,%s,%s,%s,%s\n",
                $item->nomor_transaksi_pembelian,
                $item->tanggal_pembelian,
                $item->nama_produk,
                $item->harga_pembelian,
                $item->jumlah_pembelian,
                $item->total_pembelian,
                $item->nama_supplier // Pastikan ada relasi supplier
            );
        }

        $fileName = "laporan_pembelian_" . now()->format('Y-m-d_H-i-s') . ".csv";

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ]);
    }
}
