<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian</title>
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
                        <h1 class="h3 mb-2 text-gray-800">Daftar Pembelian</h1>
                        <a href="{{ route('pembelian.create') }}" class="btn btn-primary">
                            <i class="fas fa-fw fa-plus"></i> Tambah Pembelian
                        </a>
                    </div>
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
                                            <th>Kode Obat</th>
                                            <th>Kode Suplier</th>
                                            <th>Harga Obat</th>
                                            <th>Jumlah Pembelian</th>
                                            <th>Total Harga</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembelian as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->kode_pembelian }}</td>
                                                <td>{{ $item->kode_obat }}</td>
                                                <td>{{ $item->kode_suplier }}</td>
                                                <td>{{ $item->harga_obat }}</td>
                                                <td>{{ $item->jumlah_pembelian }}</td>
                                                <td>{{ $item->total_harga }}</td>
                                                <td>{{ $item->tanggal_pembelian->format('d-m-Y') }}</td>
                                                <td>
                                                    <a href="{{ route('pembelian.edit', $item->id_pembelian) }}" class="btn btn-warning btn-sm">Edit</a>
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
    @include('template.script')
</body>
</html>
