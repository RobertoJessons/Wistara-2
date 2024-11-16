<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\TransaksiPenjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    // Menampilkan daftar transaksi penjualan
    public function index()
    {
        // Mengambil semua transaksi penjualan dan memuat relasi dengan customer
        $transaksiPenjualan = TransaksiPenjualan::with('customer')->get();
        return view('TransaksiPenjualan.index', compact('transaksiPenjualan'));
    }
    

    // Menampilkan form untuk menambahkan transaksi baru
    public function create()
    {
        $customer = Customer::all();
        $produk = Produk::all();
        return view('TransaksiPenjualan.create', compact('produk', 'customer'));
    }

    // Menyimpan transaksi baru
    public function store(Request $request)
    {
        // Validasi data transaksi tanpa 'id_customer'
        $request->validate([
            'nomor_transaksi_penjualan' => 'required|unique:transaksi_penjualan',
            'tanggal_transaksi' => 'required|date',
            'id_produk' => 'required|array',
            'id_produk.*' => 'required|string',
            'nama_produk' => 'required|array',
            'nama_produk.*' => 'required|string',
            'harga' => 'required|array',
            'harga.*' => 'required|integer',
            'jumlah_produk' => 'required|array',
            'jumlah_produk.*' => 'required|integer',
            'total_harga' => 'required|array',
            'total_harga.*' => 'required|integer',
            'id_customer' => 'required|string',
        ]);
    
        // Ambil data transaksi utama
        $nomorTransaksi = $request->nomor_transaksi_penjualan;
        $tanggalTransaksi = $request->tanggal_transaksi;
        $idCustomer = $request->id_customer; // Menyimpan id_customer
    
        // Loop untuk setiap produk yang dipilih
        foreach ($request->id_produk as $index => $idProduk) {
            // Menambahkan transaksi penjualan
            $transaksi = TransaksiPenjualan::create([
                'nomor_transaksi_penjualan' => $nomorTransaksi,
                'tanggal_transaksi' => $tanggalTransaksi,
                'id_produk' => $idProduk,
                'nama_produk' => $request->nama_produk[$index],
                'harga' => $request->harga[$index],
                'jumlah_produk' => $request->jumlah_produk[$index],
                'total_harga' => $request->total_harga[$index],
                'id_customer' => $idCustomer, // Menambahkan id_customer ke transaksi
            ]);
    
            // Menghitung poin customer
            $poin = max($transaksi->total_harga*0.001, 0); // Poin tidak bisa negatif
    
            // Update poin customer
            $customer = Customer::find($idCustomer);
            $customer->poin += $poin; // Tambah poin
            $customer->save(); // Simpan perubahan
        }
    
        return redirect()->route('transaksiPenjualan.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }
    
    

    // Menampilkan detail transaksi
    public function show($nomor_transaksi_penjualan)
    {
        $transaksi = TransaksiPenjualan::findOrFail($nomor_transaksi_penjualan);
        return view('TransaksiPenjualan.show', compact('transaksi'));
    }

    // Menampilkan form untuk mengedit transaksi
    public function edit($nomor_transaksi_penjualan)
    {
        $transaksi = TransaksiPenjualan::findOrFail($nomor_transaksi_penjualan);
        $produk = Produk::all();
        return view('TransaksiPenjualan.edit', compact('transaksi', 'produk'));
    }

    // Memperbarui transaksi
    public function update(Request $request, $nomor_transaksi_penjualan)
    {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|integer',
            'jumlah_produk' => 'required|integer',
            'total_harga' => 'required|integer',
        ]);

        $transaksi = TransaksiPenjualan::findOrFail($nomor_transaksi_penjualan);
        $transaksi->update($request->all());

        return redirect()->route('transaksiPenjualan.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Menghapus transaksi
    public function destroy($nomor_transaksi_penjualan)
    {
        $transaksi = TransaksiPenjualan::findOrFail($nomor_transaksi_penjualan);
        $transaksi->delete();

        return redirect()->route('transaksiPenjualan.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
