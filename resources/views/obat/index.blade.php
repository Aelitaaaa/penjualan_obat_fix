<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat - KLIMISTRI</title>
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
                        <h1 class="h3 mb-2 text-gray-800">Data Obat Klinik Klimistri</h1>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahObatModal">
                            <i class="fas fa-fw fa-plus"></i> Tambah Obat
                        </button>
                    </div>

                    <!-- Modal Tambah Obat -->
                    @include('obat.create')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Obat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Suplier</th>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($obat as $key => $obatItem)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $obatItem->kode_suplier }}</td>
                                                <td>{{ $obatItem->kode_obat }}</td>
                                                <td>{{ $obatItem->nama_obat }}</td>
                                                <td>{{ $obatItem->harga_obat }}</td>
                                                <td>{{ $obatItem->jumlah_obat }}</td>
                                                <td>{{ $obatItem->Satuan }}</td>
                                                <td>{{ $obatItem->total_harga_obat }}</td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editObatModal{{ $obatItem->id_obat }}">Edit</button>
                                                    <form action="{{ route('obat.delete', $obatItem->id_obat) }}" method="POST" style="display:inline-block;">
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

<!-- Modal Edit Obat -->
@foreach ($obat as $obatItem)
<div class="modal fade" id="editObatModal{{ $obatItem->id_obat }}" tabindex="-1" role="dialog" aria-labelledby="editObatModalLabel{{ $obatItem->id_obat }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editObatModalLabel{{ $obatItem->id_obat }}">Edit Obat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('obat.update', $obatItem->id_obat) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Suplier</label>
                        <input type="text" name="kode_suplier" class="form-control" value="{{ $obatItem->kode_suplier }}" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Obat</label>
                        <input type="text" name="kode_obat" class="form-control" value="{{ $obatItem->kode_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" value="{{ $obatItem->nama_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Obat</label>
                        <input type="number" name="harga_obat" class="form-control" value="{{ $obatItem->harga_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Obat</label>
                        <input type="number" name="jumlah_obat" class="form-control" value="{{ $obatItem->jumlah_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" name="Satuan" class="form-control" value="{{ $obatItem->Satuan }}" required>
                    </div>
                    <div class="form-group">
                        <label>Total Harga Obat</label>
                        <input type="number" name="total_harga_obat" class="form-control" value="{{ $obatItem->total_harga_obat }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
