<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <h1>Menu</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nomor Telepon</th>
                <th>Nama Customer</th>
                <th>Poin</th>
                <th>Tanggal Mendaftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customer as $customer)
                <tr>
                    <td>{{ $customer->nomor_telepon }}</td>
                    <td>{{ $customer->nama_customer }}</td>
                    <td>{{ $customer->poin }}</td>
                    <td>{{ $customer->tanggal_mendaftar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
