<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Menampilkan daftar supplier
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index', compact('supplier'));
    }

    // Menampilkan form untuk menambahkan supplier baru
    public function create()
    {
        return view('supplier.create');
    }

    // Menyimpan supplier baru
    public function store(Request $request)
    {
        $request->validate([
            'id_supplier' => 'required|unique:supplier',
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'nomor_telepon_supplier' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')
                         ->with('success', 'Supplier berhasil ditambahkan');
    }

    // Menampilkan detail supplier tertentu
    public function show(Supplier $supplier)
    {
        return view('supplier.show', compact('supplier'));
    }

    // Menampilkan form untuk mengedit supplier
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    // Memperbarui data supplier
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'nomor_telepon_supplier' => 'required',
        ]);

        $supplier->update($request->all());

        return redirect()->route('supplier.index')
                         ->with('success', 'Supplier berhasil diperbarui');
    }

    // Menghapus supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('supplier.index')
                         ->with('success', 'Supplier berhasil dihapus');
    }
}
