<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok;

class StokController extends Controller
{
    // Menampilkan daftar stok
    public function index()
    {
        $stok = Stok::all();
        return view('stok.index', compact('stok'));
    }

    // Menampilkan form untuk menambah stok baru
    public function create()
    {
        $transaksiPembelian = \App\Models\TransaksiPembelian::all(); // Mengambil semua data transaksi pembelian
        $existingStok = \App\Models\Stok::pluck('nama_stok')->toArray(); // Mengambil semua nama_stok yang sudah ada di tabel stok
        
        return view('stok.create', compact('transaksiPembelian', 'existingStok'));
    }

    // Menyimpan data stok baru
    public function store(Request $request)
    {
        $request->validate([
            'id_stok' => 'required|unique:stok,id_stok',
            'nama_stok' => 'required|unique:stok,nama_stok',
            'tanggal_pembelian' => 'required|date',
            'kuantitas' => 'required|integer',
        ]);

        Stok::create($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data stok
    public function edit($id_stok)
    {
        $stok = Stok::findOrFail($id_stok);
        return view('stok.edit', compact('stok'));
    }

    // Memperbarui data stok berdasarkan ID
    public function update(Request $request, $id_stok)
    {
        $request->validate([
            'nama_stok' => 'required|unique:stok,nama_stok,' . $id_stok . ',id_stok',
            'tanggal_pembelian' => 'required|date',
            'kuantitas' => 'required|integer',
        ]);

        $stok = Stok::findOrFail($id_stok);
        $stok->update($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui.');
    }

    // Menghapus data stok berdasarkan ID
    public function destroy($id_stok)
    {
        $stok = Stok::findOrFail($id_stok);
        $stok->delete();

        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus.');
    }
}
