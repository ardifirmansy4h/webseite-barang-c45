@extends('template.main')
@section('content')
    <div id="main">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Cari Laporan</h3>
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
                    <div class="card text-left">
                        <img class="card-img-top" src="holder.js/100px180/" alt="">
                        <div class="card-body">
                            <form action="{{ route('laporan.bulan') }}" method="post" enctype="multipart/form-data"
                                class="form-inline">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="bulan" class="mr-2">Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        @php
                                            $bulan = [
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
                                        @foreach ($bulan as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2 ml-3">
                                    <label for="tahun" class="mr-2">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        @php
                                            $tahunSekarang = date('Y');
                                        @endphp
                                        @for ($i = 0; $i <= 5; $i++)
                                            <option value="{{ $tahunSekarang - $i }}">{{ $tahunSekarang - $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2 ml-3">Cari</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
