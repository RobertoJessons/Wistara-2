<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('produk.create');
    }

    // Menyimpan data produk baru
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|unique:produk,id_produk',
            'nama_produk' => 'required|unique:produk,nama_produk',
            'jenis_produk' => 'required',
            'harga' => 'required|integer',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data produk
    public function edit($id_produk)
    {
        $produk = Produk::findOrFail($id_produk);
        return view('produk.edit', compact('produk'));
    }

    // Memperbarui data produk berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_produk' => 'required',
            'jenis_produk' => 'required',
            'harga' => 'required|numeric',
        ]);
    
        // Cek apakah ada produk lain dengan nama yang sama, kecuali produk yang sedang diedit
        $existingProduct = Produk::where('nama_produk', $request->nama_produk)
                                 ->where('id_produk', '!=', $id)
                                 ->first();
    
        if ($existingProduct) {
            // Jika produk dengan nama yang sama ditemukan, kembalikan dengan pesan error
            return back()->with('error', 'Nama produk sudah ada! Gagal memperbarui produk.')->withInput();
        }
    
        try {
            // Mencari produk yang akan diedit
            $produk = Produk::findOrFail($id);
            $produk->update($validated);
            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan lain
            return back()->with('error', 'Terjadi kesalahan saat memperbarui produk.')->withInput();
        }
    }

    // Menghapus data produk berdasarkan ID
    public function destroy($id_produk)
    {
        $produk = Produk::findOrFail($id_produk);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
