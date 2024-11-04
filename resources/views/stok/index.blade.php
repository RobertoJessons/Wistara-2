<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok</title>
</head>
<body>
    <h1>Stok</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id Stok</th>
                <th>Nama Stok</th>
                <th>Tanggal Pembelian</th>
                <th>Kuantitas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stok as $stok)
                <tr>
                    <td>{{ $stok->id_stok }}</td>
                    <td>{{ $stok->nama_stok }}</td>
                    <td>{{ $stok->tanggal_pembelian }}</td>
                    <td>{{ $stok->kuantitas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
