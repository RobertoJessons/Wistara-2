<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-gray-200 dark:bg-gray-900 p-5">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mb-4">Wistara</h3>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('kelola.produk') }}" class="block py-2 px-4 rounded text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        Kelola Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelola.customer') }}" class="block py-2 px-4 rounded text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        Kelola Customer
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelola.transaksiPembelian') }}" class="block py-2 px-4 rounded text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        Kelola Transaksi Pembelian
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelola.stok') }}" class="block py-2 px-4 rounded text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        Kelola Stok
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelola.supplier') }}" class="block py-2 px-4 rounded text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        Kelola Supplier
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelola.transaksiPenjualan') }}" class="block py-2 px-4 rounded text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        Kelola Transaksi Penjualan
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelola.laporan') }}" class="block py-2 px-4 rounded text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">
                        Kelola Laporan
                    </a>
                </li>
            </ul>
        </div> --}}

        <!-- Main Content -->
        <div class="flex-1 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
