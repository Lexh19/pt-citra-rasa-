<!-- resources/views/transactions/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <!-- Add your CSS links here -->
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Transaksi</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Customer</th>
                    <th>Tipe Kendaraan</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->customer->name }}</td>
                        <td>{{ $transaction->vehicle->type }}</td>
                        <td>{{ $transaction->vehicle->price }}</td>
                        <td>{{ $transaction->is_free ? 'Gratis' : 'Berbayar' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
