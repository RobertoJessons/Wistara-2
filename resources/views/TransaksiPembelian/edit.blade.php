<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi Pembelian</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<x-app-layout>
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Edit Transaksi Pembelian</h1>

        <form action="{{ route('transaksiPembelian.update', $transaksi->id_transaksi_pembelian) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">ID Transaksi Pembelian:</label>
                <input type="text" name="id_transaksi_pembelian" value="{{ $transaksi->id_transaksi_pembelian }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Tanggal Pembelian:</label>
                <input type="date" name="tanggal_pembelian" value="{{ $transaksi->tanggal_pembelian }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">ID Supplier:</label>
                <select name="id_supplier" id="id_supplier" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" onchange="updateSupplierName()" required>
                    <option value="">Pilih Supplier</option>
                    @foreach($supplier as $supplier)
                        <option value="{{ $supplier->id_supplier }}" data-nama-supplier="{{ $supplier->nama_supplier }}" 
                        {{ $transaksi->id_supplier == $supplier->id_supplier ? 'selected' : '' }}>
                            {{ $supplier->id_supplier }}
                        </option>
                    @endforeach
                </select>
            </div>            
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Nama Supplier:</label>
                <input type="text" name="nama_supplier" value="{{ $transaksi->nama_supplier }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Nama Stok:</label>
                <input type="text" name="nama_stok" value="{{ $transaksi->nama_stok }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Jumlah Stok:</label>
                <input type="number" name="jumlah_stok" value="{{ $transaksi->jumlah_stok }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Harga Stok:</label>
                <input type="number" name="harga_stok" value="{{ $transaksi->harga_stok }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Total Pembelian:</label>
                <input type="number" name="total_pembelian" value="{{ $transaksi->total_pembelian }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
        </form>
    </div>
</x-app-layout>

</body>
</html>