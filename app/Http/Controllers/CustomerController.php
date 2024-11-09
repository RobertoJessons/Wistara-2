<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    // Menampilkan form untuk membuat pelanggan baru
    public function create()
    {
        return view('customer.create');
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'nomor_telepon' => 'required|unique:customer',
            'nama_customer' => 'required|string',
            'password' => 'required|string',
            'poin' => 'integer',
            'tanggal_mendaftar' => 'required|date',
        ]);

        Customer::create($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data pelanggan
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    // Memperbarui data pelanggan berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_telepon' => 'required|unique:customer,nomor_telepon,' . $id . ',id_customer',
            'nama_customer' => 'required|string',
            'password' => 'required|string',
            'poin' => 'integer',
            'tanggal_mendaftar' => 'required|date',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer berhasil diperbarui.');
    }

    // Menghapus data pelanggan berdasarkan ID
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus.');
    }
}
