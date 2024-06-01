@extends('template.main')
@section('content')
    <div id="main">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Barang Tersedia</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <section class="section mt-5">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Ukuran</th>
                                            <th>Jenis Motor</th>
                                            <th>Masa Berlaku</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="nama">{{ $item->nama }}</td>
                                                <td>{{ $item->ukuran }}</td>
                                                <td>{{ $item->jenis_motor }}</td>
                                                @php \Carbon\Carbon::setLocale('id'); @endphp
                                                <td>{{ \Carbon\Carbon::parse($item->masa_berlaku)->translatedFormat('l, j F Y') }}
                                                </td>
                                                <td>{{ $item->harga }}</td>
                                                <td class="stok">{{ $item->jumlah }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Barang Tidak Tersedia</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <section class="section mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Ukuran</th>
                                            <th>Jenis Motor</th>
                                            <th>Masa Berlaku</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataT as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="nama">{{ $item->nama }}</td>
                                                <td>{{ $item->ukuran }}</td>
                                                <td>{{ $item->jenis_motor }}</td>
                                                @php \Carbon\Carbon::setLocale('id'); @endphp
                                                <td>{{ \Carbon\Carbon::parse($item->masa_berlaku)->translatedFormat('l, j F Y') }}
                                                </td>
                                                <td>{{ $item->harga }}</td>
                                                <td class="stok">{{ $item->jumlah }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endsection
