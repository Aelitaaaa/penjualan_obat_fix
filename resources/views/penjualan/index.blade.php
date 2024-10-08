<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjualan</title>
    @include('template.head')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('template.navbar')

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Daftar Penjualan</h1>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPenjualanModal">
                            <i class="fas fa-fw fa-plus"></i> Tambah Penjualan
                        </button>
                    </div>
                    
                    @include('penjualan.create')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Penjualan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Penjualan</th>
                                            <th>Nama Pasien</th>
                                            <th>Total Penjualan</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penjualan as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->kode_penjualan }}</td>              
                                                <td>{{ $item->pasien ? $item->pasien->nama_pasien : '' }}</td>
                                                <td>Rp. {{ $item->total_penjualan }}</td>
                                                <td>{{ $item->created_at}}</td>
                                                <td>
                                                    <a href="" class="btn btn-warning btn-sm">Detail</a>
                                                    <form action="{{ route('penjualan.destroy', $item->id_penjualan) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @include('template.script')
</body>
</html>
