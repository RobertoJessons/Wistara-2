<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Stok</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">
<!-- Header -->
    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 0.75rem;" class="h-9 w-auto fill-current text-gray-800 dark:text-gray-200" viewBox="0 0 512 512">
                <path d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6l0 242.9c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4L0 134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1 0-188L288 246.6l0 188z"/>
            </svg>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Stok') }}
            </h2>
            </div>
        </x-slot>
            <!-- Main Content -->
            <div class="flex-1 p-6">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Data Stok</h1>
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">id Stok</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Nama Stok</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Tanggal Pembelian</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Kuantitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stok as $stok)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $stok->id_stok }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $stok->nama_stok }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $stok->tanggal_pembelian }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $stok->kuantitas }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </x-app-layout>
    
</body>
</html>
