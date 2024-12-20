<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 0.75rem;" class="h-9 w-auto fill-current text-gray-800 dark:text-gray-200" viewBox="0 0 640 512">
                <path d="M272.2 64.6l-51.1 51.1c-15.3 4.2-29.5 11.9-41.5 22.5L153 161.9C142.8 171 129.5 176 115.8 176L96 176l0 128c20.4 .6 39.8 8.9 54.3 23.4l35.6 35.6 7 7c0 0 0 0 0 0L219.9 397c6.2 6.2 16.4 6.2 22.6 0c1.7-1.7 3-3.7 3.7-5.8c2.8-7.7 9.3-13.5 17.3-15.3s16.4 .6 22.2 6.5L296.5 393c11.6 11.6 30.4 11.6 41.9 0c5.4-5.4 8.3-12.3 8.6-19.4c.4-8.8 5.6-16.6 13.6-20.4s17.3-3 24.4 2.1c9.4 6.7 22.5 5.8 30.9-2.6c9.4-9.4 9.4-24.6 0-33.9L340.1 243l-35.8 33c-27.3 25.2-69.2 25.6-97 .9c-31.7-28.2-32.4-77.4-1.6-106.5l70.1-66.2C303.2 78.4 339.4 64 377.1 64c36.1 0 71 13.3 97.9 37.2L505.1 128l38.9 0 40 0 40 0c8.8 0 16 7.2 16 16l0 208c0 17.7-14.3 32-32 32l-32 0c-11.8 0-22.2-6.4-27.7-16l-84.9 0c-3.4 6.7-7.9 13.1-13.5 18.7c-17.1 17.1-40.8 23.8-63 20.1c-3.6 7.3-8.5 14.1-14.6 20.2c-27.3 27.3-70 30-100.4 8.1c-25.1 20.8-62.5 19.5-86-4.1L159 404l-7-7-35.6-35.6c-5.5-5.5-12.7-8.7-20.4-9.3C96 369.7 81.6 384 64 384l-32 0c-17.7 0-32-14.3-32-32L0 144c0-8.8 7.2-16 16-16l40 0 40 0 19.8 0c2 0 3.9-.7 5.3-2l26.5-23.6C175.5 77.7 211.4 64 248.7 64L259 64c4.4 0 8.9 .2 13.2 .6zM544 320l0-144-48 0c-5.9 0-11.6-2.2-15.9-6.1l-36.9-32.8c-18.2-16.2-41.7-25.1-66.1-25.1c-25.4 0-49.8 9.7-68.3 27.1l-70.1 66.2c-10.3 9.8-10.1 26.3 .5 35.7c9.3 8.3 23.4 8.1 32.5-.3l71.9-66.4c9.7-9 24.9-8.4 33.9 1.4s8.4 24.9-1.4 33.9l-.8 .8 74.4 74.4c10 10 16.5 22.3 19.4 35.1l74.8 0zM64 336a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm528 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32z"/>
            </svg>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Supplier') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex-1 p-6 w-full">
        <!-- Judul Halaman dan Tombol Tambah -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Data Supplier</h1>
            <a href="{{ route('supplier.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Tambah Supplier Baru
            </a>
        </div>

        <!-- Search Bar -->
        <div class="mb-4">
            <input 
                type="text" 
                id="searchInput" 
                placeholder="Cari berdasarkan ID, Nama, atau Alamat Supplier..." 
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200"
                onkeyup="filterTable()"
            />
        </div>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Data Supplier -->
        <table id="supplierTable" class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">No</th>
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">ID Supplier</th>
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Nama Supplier</th>
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Alamat</th>
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Nomor Telepon</th>
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supplier as $supplier)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $supplier->id_supplier }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $supplier->nama_supplier }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $supplier->alamat }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $supplier->nomor_telepon_supplier }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">
                            <a href="{{ route('supplier.edit', $supplier->id_supplier) }}" class="text-blue-600 dark:text-blue-400">Edit</a>
                            <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-red-400 ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

<!-- Script for Filtering Table -->
<script>
    function filterTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('supplierTable');
        const rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let match = false;

            for (let j = 0; j < cells.length - 1; j++) { // Exclude the last column (actions)
                if (cells[j] && cells[j].textContent.toLowerCase().includes(filter)) {
                    match = true;
                    break;
                }
            }

            rows[i].style.display = match ? '' : 'none';
        }
    }
</script>

</body>
</html>
