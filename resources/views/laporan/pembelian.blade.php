<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan Pembelian</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Header -->
    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 0.75rem;" class="h-9 w-auto fill-current text-gray-800 dark:text-gray-200" viewBox="0 0 512 512">
                    <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 400c0 44.2 35.8 80 80 80l400 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 416c-8.8 0-16-7.2-16-16L64 64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/>
                </svg>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Laporan Pembelian') }}
                </h2>
            </div>
        </x-slot>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Data Laporan Pembelian</h1>

            <!-- Pesan Error -->
            @if(session('error'))
                <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="bg-yellow-500 text-white px-4 py-2 rounded mb-4">
                    {{ session('warning') }}
                </div>
            @endif

            <!-- Form Filter -->
            <form method="GET" action="{{ route('laporan.pembelian.index') }}" class="mb-4">
                <label for="tanggal_awal" class="text-gray-700 dark:text-gray-300">Tanggal Awal:</label>
                <input type="date" name="tanggal_awal" id="tanggal_awal" class="rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" value="{{ request('tanggal_awal') }}">
                
                <label for="tanggal_akhir" class="ml-2 text-gray-700 dark:text-gray-300">Tanggal Akhir:</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" value="{{ request('tanggal_akhir') }}">
                
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Terapkan</button>
            
                <!-- Tombol Download -->
                <button type="submit" formaction="{{ route('laporan.pembelian.download') }}" class="px-4 py-2 bg-green-500 text-white rounded">Download</button>
            </form>

            <!-- Tabel Laporan Pembelian -->
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">ID Transaksi</th>
                        <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Tanggal Pembelian</th>
                        <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">ID Supplier</th>
                        <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Nama Supplier</th>
                        <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Nama Stok</th>
                        <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Jumlah Stok</th>
                        <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Harga Stok</th>
                        <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Total Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksi_pembelian as $laporan)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $laporan->id_transaksi_pembelian }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $laporan->tanggal_pembelian }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $laporan->id_supplier }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $laporan->nama_supplier }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $laporan->nama_stok }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $laporan->jumlah_stok }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $laporan->harga_stok }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $laporan->total_pembelian }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-2 px-4 text-center text-gray-700 dark:text-gray-300">Tidak ada data laporan untuk ditampilkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-app-layout>
</body>

</html>
