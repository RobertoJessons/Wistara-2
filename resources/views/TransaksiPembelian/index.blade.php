<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembelian</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">
<!-- Header -->
    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 0.75rem;" class="h-9 w-auto fill-current text-gray-800 dark:text-gray-200" viewBox="0 0 576 512">
                <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
            </svg>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Transaksi Pembelian') }}
            </h2>
            </div>
        </x-slot>
            <!-- Main Content -->
            <div class="flex-1 p-6">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Data Transaksi Pembelian</h1>
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">id Transaksi Pembelian</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Tanggal Pembelian</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Nama Supplier</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Nama Stok</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Jumlah Stok</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Harga Stok</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Total Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi_pembelian as $transaksi_pembelian)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $transaksi_pembelian->id_transaksi_pembelian }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $transaksi_pembelian->tanggal_pembelian }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $transaksi_pembelian->nama_supplier }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $transaksi_pembelian->nama_stok }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $transaksi_pembelian->jumlah_stok }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $transaksi_pembelian->harga_stok }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $transaksi_pembelian->total_pembelian }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </x-app-layout>
    
</body>
</html>
