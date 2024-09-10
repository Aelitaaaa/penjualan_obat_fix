<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian</title>
    @include('template.head')
    @include('template.script')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('template.navbar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Daftar Pembelian</h1>
                        <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahPembelianModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Pembelian</span>
                        </a>
                    </div>
                    
                    @include('pembelian.create')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Pembelian</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Pembelian</th>
                                            <th>Kode Suplier</th>
                                            <th>Total Pembelian</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembelian as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->kode_pembelian }}</td>              
                                                <td>{{ $item->kode_suplier }}</td>
                                                <td>Rp. {{ number_format($item->total_pembelian, 0, ',', '.') }}</td>
                                                <td>{{ $item->created_at}}</td>
                                                <td>
                                                    <a href="{{ route('detail_pembelian.index', ['kode' => $item->kode_pembelian]) }}" class="btn btn-warning btn-sm">Detail</a>
                                                    <form action="{{ route('pembelian.destroy', $item->id_pembelian) }}" method="POST" style="display:inline-block;">
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
</body>
</html>
