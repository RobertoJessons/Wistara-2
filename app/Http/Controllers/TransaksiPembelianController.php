<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPembelian;
use App\Models\Supplier; // Pastikan Anda memiliki model Supplier
use App\Models\TransaksiPenjualan;

class TransaksiPembelianController extends Controller
{
    // Menampilkan daftar transaksi pembelian
    public function index()
    {
        $transaksi = TransaksiPembelian::all();
        return view('transaksiPembelian.index', compact('transaksi'));
    }

    // Menampilkan form untuk menambah transaksi pembelian baru
    public function create()
    {
        $supplier = Supplier::all(); // Mengambil semua data supplier
        return view('transaksiPembelian.create', compact('supplier'));
    }

    // Menyimpan data transaksi pembelian baru
    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi_pembelian' => 'required|unique:transaksi_pembelian,id_transaksi_pembelian',
            'tanggal_pembelian' => 'required|date',
            'id_supplier' => 'required',
            'nama_stok' => 'required|unique:transaksi_pembelian,nama_stok',
            'jumlah_stok' => 'required|integer',
            'harga_stok' => 'required|integer',
            'total_pembelian' => 'required|integer',
        ]);

        TransaksiPenjualan::create($request->all());
        // Mengambil nama_supplier berdasarkan id_supplier yang dipilih
        $supplier = Supplier::where('id_supplier', $request->id_supplier)->first();
        $nama_supplier = $supplier ? $supplier->nama_supplier : null;

        // Menyimpan data
        TransaksiPembelian::create([
            'id_transaksi_pembelian' => $request->id_transaksi_pembelian,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'id_supplier' => $request->id_supplier,
            'nama_supplier' => $nama_supplier,
            'nama_stok' => $request->nama_stok,
            'jumlah_stok' => $request->jumlah_stok,
            'harga_stok' => $request->harga_stok,
            'total_pembelian' => $request->total_pembelian,
        ]);

        return redirect()->route('transaksiPembelian.index')->with('success', 'Transaksi pembelian berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data transaksi pembelian
    public function edit($id_transaksi_pembelian)
    {
        $transaksi = TransaksiPembelian::findOrFail($id_transaksi_pembelian);
        $supplier = Supplier::all(); // Mengambil semua data supplier untuk dropdown
        return view('transaksiPembelian.edit', compact('transaksi', 'supplier'));
    }

    // Memperbarui data transaksi pembelian berdasarkan ID
    public function update(Request $request, $id_transaksi_pembelian)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'id_supplier' => 'required',
            'nama_stok' => 'required|unique:transaksi_pembelian,nama_stok,' . $id_transaksi_pembelian . ',id_transaksi_pembelian',
            'jumlah_stok' => 'required|integer',
            'harga_stok' => 'required|integer',
            'total_pembelian' => 'required|integer',
        ]);

        // Mengambil nama_supplier berdasarkan id_supplier yang dipilih
        $supplier = Supplier::where('id_supplier', $request->id_supplier)->first();
        $nama_supplier = $supplier ? $supplier->nama_supplier : null;

        // Memperbarui data
        $transaksi = TransaksiPembelian::findOrFail($id_transaksi_pembelian);
        $transaksi->update([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'id_supplier' => $request->id_supplier,
            'nama_supplier' => $nama_supplier,
            'nama_stok' => $request->nama_stok,
            'jumlah_stok' => $request->jumlah_stok,
            'harga_stok' => $request->harga_stok,
            'total_pembelian' => $request->total_pembelian,
        ]);

        return redirect()->route('transaksiPembelian.index')->with('success', 'Transaksi pembelian berhasil diperbarui.');
    }

    // Menghapus data transaksi pembelian berdasarkan ID
    public function destroy($id_transaksi_pembelian)
    {
        $transaksi = TransaksiPembelian::findOrFail($id_transaksi_pembelian);
        $transaksi->delete();

        return redirect()->route('transaksiPembelian.index')->with('success', 'Transaksi pembelian berhasil dihapus.');
    }
}
