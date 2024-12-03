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
            const poinDisplay = document.getElementById('poin-customer');
            const tukarPoinCheckbox = document.getElementById('tukar_poin_checkbox');

            // Mengupdate value id_customer berdasarkan pilihan
            idCustomerInput.value = selectedOption.getAttribute('data-id-customer') || '';

            // Menampilkan jumlah poin jika customer dipilih
            const customerPoin = selectedOption.getAttribute('data-poin-customer') || 0;
            poinDisplay.textContent = `Poin yang dimiliki: ${customerPoin}`;

            // Reset checkbox dan hidden poin saat customer dipilih
            if (tukarPoinCheckbox.checked) {
                tukarPoinCheckbox.checked = false;
            }
        }

        // Fungsi untuk menampilkan poin saat checkbox Tukar Poin dicentang
        function togglePoinDisplay(checkbox) {
            const poinDisplay = document.getElementById('poin-customer');
            const poinCustomer = parseFloat(document.getElementById('nama_customer').selectedOptions[0].getAttribute(
                'data-poin-customer')) || 0;
            const totalHargaInput = document.querySelector('[name="total_harga[]"]');
            const totalHarga = parseFloat(totalHargaInput.value) || 0;

            // Perhitungan poin untuk pengecekan cukup atau tidak
            const poinDibutuhkan = totalHarga / 1000;
            const poinWarning = document.getElementById('poin-warning');

            if (checkbox.checked) {
                // Tampilkan poin yang dimiliki
                poinDisplay.style.display = 'block';
                // Set nilai tukar_poin ke true
                document.getElementById('tukar_poin').value = 'true';

                if (poinCustomer < poinDibutuhkan) {
                    // Jika poin tidak cukup, tampilkan peringatan
                    poinWarning.style.display = 'block';
                    checkbox.checked = false; // Uncheck checkbox
                    // Set nilai tukar_poin kembali ke false
                    document.getElementById('tukar_poin').value = 'false';
                } else {
                    poinWarning.style.display = 'none';
                }
            } else {
                // Jika checkbox tidak dicentang, sembunyikan poin
                poinDisplay.style.display = 'none';
                poinWarning.style.display = 'none';
                // Set nilai tukar_poin ke false
                document.getElementById('tukar_poin').value = 'false';
            }
        }


        // Fungsi untuk menghitung total harga dan mengecek poin saat jumlah produk diinputkan
        function calculateTotal(inputElement) {
            const row = inputElement.parentElement;
            const jumlahProduk = parseFloat(row.querySelector('[name="jumlah_produk[]"]').value) || 0;
            const hargaProduk = parseFloat(row.querySelector('[name="harga[]"]').value) || 0;
            const totalHargaInput = row.querySelector('[name="total_harga[]"]');
            const totalHarga = jumlahProduk * hargaProduk;

            totalHargaInput.value = totalHarga;

            // Mengecek apakah poin cukup setelah input jumlah produk
            const poinCustomer = parseFloat(document.getElementById('nama_customer').selectedOptions[0].getAttribute(
                'data-poin-customer')) || 0;
            const poinDibutuhkan = totalHarga / 1000;
            const poinWarning = document.getElementById('poin-warning');
            const tukarPoinCheckbox = document.getElementById('tukar_poin_checkbox');

            if (tukarPoinCheckbox.checked) {
                if (poinCustomer < poinDibutuhkan) {
                    // Jika poin tidak cukup, tampilkan peringatan
                    poinWarning.style.display = 'block';
                    tukarPoinCheckbox.checked = false; // Uncheck checkbox
                } else {
                    poinWarning.style.display = 'none';
                }
            }
        }

        // Fungsi untuk menambahkan baris produk
        function addProductRow() {
            const productRows = document.getElementById('product-rows');
            const newRow = document.createElement('div');
            newRow.className = 'flex space-x-4 mb-4 product-row';

            newRow.innerHTML = `
                <select name="id_produk[]" class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300" required onchange="updateProductDetails(this)">
                    <option value="">Pilih Produk</option>
                    @foreach ($produk as $item)
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

        // Fungsi untuk mengupdate produk yang dipilih
        function updateProductDetails(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const namaProdukInput = selectElement.parentElement.querySelector('[name="nama_produk[]"]');
            const hargaProdukInput = selectElement.parentElement.querySelector('[name="harga[]"]');

            // Ambil data nama produk dan harga produk dari atribut data
            namaProdukInput.value = selectedOption.getAttribute('data-nama-produk') || '';
            hargaProdukInput.value = selectedOption.getAttribute('data-harga-produk') || 0;

            calculateTotal(selectElement);
        }

        // Fungsi untuk menangani pengiriman form dan memastikan nilai poin dikirim sesuai checkbox
        function handleFormSubmit() {
            const tukarPoinCheckbox = document.getElementById('tukar_poin_checkbox');
            // Mengatur nilai poin sesuai dengan checkbox
            document.getElementById('poin').value = tukarPoinCheckbox.checked ? true : false;
        }
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <x-app-layout>
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Tambah Transaksi Penjualan</h1>

            <form action="{{ route('transaksiPenjualan.store') }}" method="POST"
                class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md" onsubmit="handleFormSubmit()">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Nomor Transaksi Penjualan:</label>
                    <input type="text" name="nomor_transaksi_penjualan"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Tanggal Transaksi:</label>
                    <input type="date" name="tanggal_transaksi"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Customer:</label>
                    <select name="nama_customer" id="nama_customer"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300"
                        required onchange="updateCustomerId(this)">
                        <option value="">Pilih Customer</option>
                        @foreach ($customer as $cust)
                            <option value="{{ $cust->id_customer }}" data-id-customer="{{ $cust->id_customer }}"
                                data-poin-customer="{{ $cust->poin }}">
                                {{ $cust->nama_customer }}
                            </option>
                        @endforeach
                    </select>
                    <!-- Input ID Customer yang tersembunyi -->
                    <input type="hidden" name="id_customer" id="id_customer">

                    <!-- Checkbox Tukar Poin -->
                    <div class="mt-4">
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" id="tukar_poin_checkbox" name="tukar_poin" value="1"
                                onclick="togglePoinDisplay(this)">
                            <span class="ml-2">Tukarkan Poin</span>
                        </label>
                        <p id="poin-customer" class="mt-2 text-gray-600 dark:text-gray-400" style="display:none;"></p>
                        <p id="poin-warning" class="mt-2 text-red-500" style="display:none;">Poin tidak cukup untuk
                            menutupi transaksi ini.</p>
                    </div>
                </div>

                <div id="product-rows" class="mb-4">
                    <!-- Baris Produk Pertama -->
                    <div class="flex space-x-4 mb-4 product-row">
                        <select name="id_produk[]"
                            class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300"
                            required onchange="updateProductDetails(this)">
                            <option value="">Pilih Produk</option>
                            @foreach ($produk as $item)
                                <option value="{{ $item->id_produk }}" data-nama-produk="{{ $item->nama_produk }}"
                                    data-harga-produk="{{ $item->harga }}">
                                    {{ $item->id_produk }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" name="nama_produk[]"
                            class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300"
                            readonly>
                        <input type="number" name="harga[]"
                            class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300"
                            readonly>
                        <input type="number" name="jumlah_produk[]"
                            class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300"
                            oninput="calculateTotal(this)" required>
                        <input type="number" name="total_harga[]"
                            class="w-1/4 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 dark:text-gray-300"
                            readonly>
                    </div>
                </div>
                <button type="button" onclick="addProductRow()"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-4">Tambah Produk</button>

                <p id="insufficient-funds" class="text-red-500" style="display:none;">Jumlah bayar tidak cukup untuk
                    transaksi ini.</p>

                <!-- Input tersembunyi untuk poin -->
                <input type="hidden" name="poin" id="poin">

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
            </form>
        </div>
    </x-app-layout>

</body>

</html>
