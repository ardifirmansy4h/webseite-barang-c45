@extends('template.main')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Dashboard</h3>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Total Barang</h4>
                                <p class="card-text">{{ $data['totalBarang'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Stok Tersedia</h4>
                                <p class="card-text">{{ $data['stokTersedia'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Stok Habis</h4>
                                <p class="card-text">{{ $data['stokHabis'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">Total Penjualan Bulan {{ $data['namaBulanSekarang'] }} </h4>
                    <p class="card-text">Rp {{ $data['totalPendapatan'] }}</p>
                </div>
            </div>
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2024 &copy; Barang</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="">Rayhan Dwiki Anugrah</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection
