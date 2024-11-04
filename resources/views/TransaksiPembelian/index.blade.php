<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Pembelian</title>
</head>
<body>
    <h1>Transaksi Pembelian</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id Transaksi Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Nama Supplier</th>
                <th>Nama Stok</th>
                <th>Jumlah Stok</th>
                <th>Harga Pembelian</th>
                <th>Total Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi_pembelian as $transaksi_pembelian)
                <tr>
                    <td>{{ $transaksi_pembelian->id_transaksi_pembelian }}</td>
                    <td>{{ $transaksi_pembelian->tanggal_pembelian }}</td>
                    <td>{{ $transaksi_pembelian->nama_supplier }}</td>
                    <td>{{ $transaksi_pembelian->nama_stok }}</td>
                    <td>{{ $transaksi_pembelian->jumlah_stok }}</td>
                    <td>{{ $transaksi_pembelian->harga_stok }}</td>
                    <td>{{ $transaksi_pembelian->total_pembelian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
