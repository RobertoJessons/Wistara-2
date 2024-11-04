<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
</head>
<body>
    <h1>Supplier</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplier as $supplier)
                <tr>
                    <td>{{ $supplier->id_supplier }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>{{ $supplier->nomor_telepon_supplier }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
