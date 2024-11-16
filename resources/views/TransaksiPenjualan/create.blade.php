<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi Penjualan</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        // Fungsi untuk memperbarui id_customer ketika nama customer dipilih
        function updateCustomerId(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const idCustomerInput = document.getElementById('id_customer');

            // Mengupdate value id_customer berdasarkan pilihan
            idCustomerInput.value = selectedOption.getAttribute('data-id-customer') || '';
        }

        function addProductRow() {
            const productRows = document.getElementById('product-rows');
            const newRow = document.createElement('div');
            newRow.className = 'flex space-x-4 mb-4 product-row';

            newRow.innerHTML = `
                <select name="id_produk[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required onchange="updateProductDetails(this)">
                    <option value="">Pilih Produk</option>
                    @foreach($produk as $item)
                        <option value="{{ $item->id_produk }}" data-nama-produk="{{ $item->nama_produk }}" data-harga-produk="{{ $item->harga }}">
                            {{ $item->id_produk }}
                        </option>
                    @endforeach
                </select>
                <input type="text" name="nama_produk[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" readonly>
                <input type="number" name="harga[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" readonly>
                <input type="number" name="jumlah_produk[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" oninput="calculateTotal(this)" required>
                <input type="number" name="total_harga[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" readonly>
            `;

            productRows.appendChild(newRow);
        }

        function updateProductDetails(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const namaProdukInput = selectElement.parentElement.querySelector('[name="nama_produk[]"]');
            const hargaProdukInput = selectElement.parentElement.querySelector('[name="harga[]"]');

            // Ambil data nama produk dan harga produk dari atribut data
            namaProdukInput.value = selectedOption.getAttribute('data-nama-produk') || '';
            hargaProdukInput.value = selectedOption.getAttribute('data-harga-produk') || 0;

            calculateTotal(selectElement);
        }

        function calculateTotal(inputElement) {
            const row = inputElement.parentElement;
            const jumlahProduk = parseFloat(row.querySelector('[name="jumlah_produk[]"]').value) || 0;
            const hargaProduk = parseFloat(row.querySelector('[name="harga[]"]').value) || 0;
            const totalHargaInput = row.querySelector('[name="total_harga[]"]');
            totalHargaInput.value = jumlahProduk * hargaProduk;
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<x-app-layout>
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Tambah Transaksi Penjualan</h1>

        <form action="{{ route('transaksiPenjualan.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Nomor Transaksi Penjualan:</label>
                <input type="text" name="nomor_transaksi_penjualan" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Tanggal Transaksi:</label>
                <input type="date" name="tanggal_transaksi" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Customer:</label>
                <select name="nama_customer" id="nama_customer" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required onchange="updateCustomerId(this)">
                    <option value="">Pilih Customer</option>
                    @foreach($customer as $cust)
                        <option value="{{ $cust->id_customer }}" data-id-customer="{{ $cust->id_customer }}">
                            {{ $cust->nama_customer }}
                        </option>
                    @endforeach
                </select>
                <!-- Input ID Customer yang tersembunyi -->
                <input type="hidden" name="id_customer" id="id_customer">
            </div>
            <div id="product-rows" class="mb-4">
                <!-- Baris Produk Pertama -->
                <div class="flex space-x-4 mb-4 product-row">
                    <select name="id_produk[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required onchange="updateProductDetails(this)">
                        <option value="">Pilih Produk</option>
                        @foreach($produk as $item)
                            <option value="{{ $item->id_produk }}" data-nama-produk="{{ $item->nama_produk }}" data-harga-produk="{{ $item->harga }}">
                                {{ $item->id_produk }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" name="nama_produk[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" readonly>
                    <input type="number" name="harga[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" readonly>
                    <input type="number" name="jumlah_produk[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" oninput="calculateTotal(this)" required>
                    <input type="number" name="total_harga[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" readonly>
                </div>
            </div>
            <button type="button" onclick="addProductRow()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-4">Tambah Produk</button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
        </form>
    </div>
</x-app-layout>

</body>
</html>
