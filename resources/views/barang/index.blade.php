@extends('template.main')
@section('content')
    <div id="main">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Barang</h3>
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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title"></h5>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">Tambah</a>
                        </div>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <input type="hidden" name="idB" value="{{ $item->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="nama">{{ $item->nama }}</td>
                                                <td class="ukuran">{{ $item->ukuran }}</td>
                                                <td class="jenis">{{ $item->jenis_motor }}</td>

                                                @php \Carbon\Carbon::setLocale('id'); @endphp
                                                <td class="masa" data-masa={{ $item->masa_berlaku }}>
                                                    {{ \Carbon\Carbon::parse($item->masa_berlaku)->translatedFormat('l, j F Y') }}
                                                </td>
                                                <td class="harga">{{ $item->harga }}</td>
                                                <td class="stok">{{ $item->jumlah }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-success btn-stok"
                                                        data-bs-toggle="modal" data-bs-target="#stokModal"
                                                        data-id="{{ $item->id }}">Stok</a>

                                                    <a href="#" class="btn btn-primary btn-jual"
                                                        data-bs-toggle="modal" data-bs-target="#jualModal"
                                                        data-id="{{ $item->id }}">Penjualan</a>

                                                    <a href="#" class="btn btn-warning btn-edit"
                                                        data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                                    <a href="#" class="btn btn-danger delete"
                                                        data-id="{{ $item->id }}"
                                                        onclick="confirmDelete(event, '{{ $item->id }}')">Hapus</a>
                                                </td>
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

    @section('modal')
        <div class="modal fade" id="stokModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Stok
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical m-2" action="{{ route('barang.store.stok') }}" method="post"
                            enctype="multipart/form-data">
                            <div class="form-body">
                                @csrf
                                <input type="hidden" id="barang_id" name="id" class="form-control" readonly>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama Barang</label>
                                            <input type="text" id="first-name-vertical" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Stok Sekarang</label>
                                            <input type="text" id="stok-sekarang" id="first-name-vertical"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Jumlah Stok Ditambah</label>
                                            <input type="number" id="first-name-vertical" class="form-control"
                                                name="stok" placeholder="Stok barang.." required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Submit</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="jualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable "
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Penjualan
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical m-2" action="{{ route('barang.penjualan') }}" method="post"
                            enctype="multipart/form-data">
                            <div class="form-body">
                                @csrf
                                <input type="hidden" id="barang_id_terjual" name="id" class="form-control"
                                    readonly>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama Barang</label>
                                            <input type="text" id="namaTerjual" name="nama_terjual"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Stok Sekarang</label>
                                            <input type="text" name="stoksekarangterjual" id="stokSekarangTerjual"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Jumlah Terjual</label>
                                            <input type="number" id="jumlahTerjual" class="form-control"
                                                name="jumlah_terjual" placeholder="Masukkan jumlah terjual" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="bulan-terjual">Bulan Terjual</label>
                                            <select id="bulan-terjual" name="bulan" class="form-control"
                                                name="bulan_terjual" required>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="tahun-terjual">Tahun Terjual</label>
                                            <select id="tahun-terjual" class="form-control" name="tahun" required>
                                                @php
                                                    $currentYear = date('Y');
                                                    $years = range($currentYear - 1, $currentYear + 2);
                                                @endphp
                                                @foreach ($years as $year)
                                                    <option value="{{ $year }}"
                                                        {{ $year == $currentYear ? 'selected' : '' }}>{{ $year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg "
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Barang
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical m-2" action="{{ route('barang.update') }}" method="post"
                            enctype="multipart/form-data">
                            <div class="form-body">
                                @csrf
                                <input type="hidden" id="barangIDEdit" name="id" class="form-control" readonly>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama Barang</label>
                                            <input type="text" id="namaBarangEdit" name="nama_barang_edit"
                                                class="form-control" placeholder="Masukkan nama">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Ukuran Barang</label>
                                            <input type="text" id="ukuranEdit" name="ukuran_edit"
                                                class="form-control" placeholder="Masukkan ukuran">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Jenis Motor</label>
                                            <input type="text" id="jenisEdit" name="jenis_edit" class="form-control"
                                                placeholder="Masukkan jenis">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="masaEdit">Masa Berlaku</label>
                                            <input type="date" id="masaEdit" class="form-control" name="masa_edit"
                                                placeholder="Masa Berlaku.." required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Harga</label>
                                            <input type="number" id="hargaEdit" class="form-control" name="harga_edit"
                                                placeholder="Masukkan harga" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical m-2" action="{{ route('barang.store') }}" method="post"
                            enctype="multipart/form-data">
                            <div class="form-body">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama</label>
                                            <input type="text" id="first-name-vertical" class="form-control"
                                                name="nama" placeholder="Nama barang.." required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="ukuran-id-vertical">Ukuran</label>
                                            <input type="text" class="form-control" name="ukuran"
                                                placeholder="Ukuran barang.." required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Jenis Motor</label>
                                            <input type="text" id="contact-info-vertical" class="form-control"
                                                name="jenis" placeholder="Jenis motor.." required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Masa Berlaku</label>
                                            <input type="date" id="contact-info-vertical" class="form-control"
                                                name="masa_berlaku" placeholder="Masa Berlaku.." required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Harga</label>
                                            <input type="number" id="contact-info-vertical" class="form-control"
                                                name="harga" placeholder="Harga barang.." required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Stok</label>
                                            <input type="number" id="contact-info-vertical" class="form-control"
                                                name="stok" placeholder="Stok barang.." required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Submit</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script>
            $('.btn-stok').on('click', function(e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('input[name="idB"]').val();
                var nama = $(this).closest('tr').find('.nama').text();
                var stok = $(this).closest('tr').find('.stok').text();

                $('#first-name-vertical').val(nama);
                $('#stok-sekarang').val(stok);
                $('#barang_id').val(id);

                $('#stokModal').modal('show');
            });

            $('.btn-jual').on('click', function(e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('input[name="idB"]').val();
                var nama = $(this).closest('tr').find('.nama').text();
                var stok = $(this).closest('tr').find('.stok').text();

                $('#namaTerjual').val(nama);
                $('#stokSekarangTerjual').val(stok);
                $('#barang_id_terjual').val(id);

                $('#jualModal').modal('show');
            });

            $('.btn-edit').on('click', function(e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('input[name="idB"]').val();
                var nama = $(this).closest('tr').find('.nama').text();
                var ukuran = $(this).closest('tr').find('.ukuran').text();
                var jenis = $(this).closest('tr').find('.jenis').text();
                var masa = $(this).closest('tr').find('.masa').data('masa');
                var harga = $(this).closest('tr').find('.harga').text();

                $('#barangIDEdit').val(id);
                $('#namaBarangEdit').val(nama);
                $('#ukuranEdit').val(ukuran);
                $('#jenisEdit').val(jenis);
                $('#masaEdit').val(masa);
                $('#hargaEdit').val(harga);

                $('#editModal').modal('show');
            });

            $(document).ready(function() {
                $('.delete').on('click', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/barang/hapus/" + id;
                        }
                    })
                });
            });
        </script>
    @endpush
