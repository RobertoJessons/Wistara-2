<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Penjualan</title>
</head>
<body>
    <h1>Transaksi Penjualan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id Transaksi Penjualan</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Jumlah Produk</th>
                <th>Total Harga</th>
                <th>Nama Customer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi_penjualan as $transaksi_penjualan)
                <tr>
                    <td>{{ $transaksi_penjualan->nomor_transaksi_penjualan }}</td>
                    <td>{{ $transaksi_penjualan->tanggal_transaksi }}</td>
                    <td>{{ $transaksi_penjualan->nama_produk }}</td>
                    <td>{{ $transaksi_penjualan->harga_produk }}</td>
                    <td>{{ $transaksi_penjualan->jumlah_produk }}</td>
                    <td>{{ $transaksi_penjualan->total_harga }}</td>
                    <td>{{ $transaksi_penjualan->nama_customer }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
