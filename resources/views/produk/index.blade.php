<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">
<!-- Header -->
    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 0.75rem;" class="h-9 w-auto fill-current text-gray-800 dark:text-gray-200" viewBox="0 0 640 512">
                <path d="M96 64c0-17.7 14.3-32 32-32l320 0 64 0c70.7 0 128 57.3 128 128s-57.3 128-128 128l-32 0c0 53-43 96-96 96l-192 0c-53 0-96-43-96-96L96 64zM480 224l32 0c35.3 0 64-28.7 64-64s-28.7-64-64-64l-32 0 0 128zM32 416l512 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 480c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/>
            </svg>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Produk') }}
            </h2>
            </div>
        </x-slot>
            <!-- Main Content -->
            <div class="flex-1 p-6">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Data Produk</h1>
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">ID</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Nama Produk</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Jenis Produk</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produk as $item)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $item->id_produk }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $item->nama_produk }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $item->jenis_produk }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $item->harga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </x-app-layout>    
</body>
</html>
