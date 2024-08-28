@extends('layout')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Obat Klinik Klimistri</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Obat-Obat</h6>
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahObatModal">
                <i class="fas fa-fw fa-plus"></i> Tambah Obat
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Suplier</th>
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

    <!-- Modal Tambah Obat -->
    <div class="modal fade" id="tambahObatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('obat.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Suplier</label>
                            <input type="text" name="kode_suplier" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kode Obat</label>
                            <input type="text" name="kode_obat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Obat</label>
                            <input type="number" name="harga_obat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Obat</label>
                            <input type="number" name="jumlah_obat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" name="Satuan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Total Harga Obat</label>
                            <input type="number" name="total_harga_obat" class="form-control" required>
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
</div>
@endsection
