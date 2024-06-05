<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan Bulanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        h3 {
            color: #4CAF50;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #dee2e6;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f9f9f9;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #999;
        }

        .total-pendapatan {
            font-weight: bold;
            text-align: right;
            padding-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Laporan Penjualan Bulanan</h3>
        @php
            $bulanIndonesia = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember',
            ];
        @endphp
        <h5>Bulan: {{ $bulanIndonesia[$bulan] }} Tahun: {{ $tahun }}</h5>
        @if ($data->isEmpty())
            <p class="no-data">Tidak ada data untuk bulan dan tahun yang dipilih.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah Awal</th>
                        <th>Jumlah Terjual</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->barang->nama }}</td>
                            <td>{{ $item->jumlah_awal }}</td>
                            <td>{{ $item->jumlah_terjual }}</td>
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="total-pendapatan">Total Pendapatan</td>
                        <td>{{ number_format($totalPendapatan, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        @endif
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
