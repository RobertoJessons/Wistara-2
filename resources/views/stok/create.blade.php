<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Baru</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<x-app-layout>
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Tambah Stok Baru</h1>

        <form action="{{ route('stok.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">ID Stok:</label>
                <input type="text" name="id_stok" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Nama Stok:</label>
                <select name="nama_stok" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
                    <option value="">Pilih Nama Stok</option>
                    @foreach($transaksiPembelian as $transaksi)
                        @if(!in_array($transaksi->nama_stok, $existingStok))
                            <option value="{{ $transaksi->nama_stok }}">{{ $transaksi->nama_stok }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Tanggal Pembelian:</label>
                <input type="date" name="tanggal_pembelian" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Kuantitas:</label>
                <input type="number" name="kuantitas" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
        </form>
    </div>
</x-app-layout>

</body>
</html>
