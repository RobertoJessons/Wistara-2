<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
</head>
<body>
    <h1>Data Produk</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Nama Produk</th>
                <th>Jenis Produk</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $produk)
                <tr>
                    <td>{{ $produk->id_produk }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->jenis_produk }}</td>
                    <td>{{ $produk->harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
