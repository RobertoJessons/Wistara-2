<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
</head>
<body>
    <h1>Laporan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id Transaksi Penjualan</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah produk</th>
                <th>Total Harga</th>
                <th>Nama Customer</th>
            </tr>
        </thead>
        {{-- <tbody>
            @foreach($produk as $produk)
                <tr>
                    <td>{{ $produk->id_produk }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->jenis_produk }}</td>
                    <td>{{ $produk->harga }}</td>
                </tr>
            @endforeach
        </tbody> --}}
    </table>
</body>
</html>
