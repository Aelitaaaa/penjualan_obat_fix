<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Resep - KLIMISTRI</title>
    @include('template.head')
    @include('template.script')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('template.navbar')

                <!-- Pesan sukses -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Data Resep - Klimistri</h1>
                        <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahResepModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Resep</span>
                        </a>
                    </div>

                    @include('resep.create')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Resep</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle" style="width: 60px">No</th>
                                            <th class="text-center align-middle" style="width: 150px">Pasien</th>
                                            <th class="text-center align-middle" style="width: 210px">Tanggal Resep</th>
                                            <th class="text-center align-middle" style="width: 150px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($resep as $key => $resepItem)
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">{{ $key + 1 }}</td>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">{{ $resepItem->pasien ? $resepItem->pasien->nama : '' }}</td>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">{{ $resepItem->tanggal_resep }}</td>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">
                                                    <a href="#" class="btn btn-info btn-circle btn-sm mr-1" data-toggle="modal" data-target="#detailResepModal{{ $resepItem->id_resep }}">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-warning btn-circle btn-sm mr-1" data-toggle="modal" data-target="#editResepModal{{ $resepItem->id_resep }}">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteResepModal{{ $resepItem->id_resep }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    @include('resep.delete')
                                                </td>
                                            </tr>
                                            @include('resep.edit')

                                            <!-- Modal Detail Resep -->
                                            <div class="modal fade" id="detailResepModal{{ $resepItem->id_resep }}" tabindex="-1" role="dialog" aria-labelledby="detailResepLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detailResepLabel">Detail Resep</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Pasien: {{ $resepItem->pasien ? $resepItem->pasien->nama : 'N/A' }}</h5>
                                                            <h5>Tanggal Resep: {{ $resepItem->tanggal_resep }}</h5>
                                                            <h6>Detail Obat:</h6>
                                                            <ul>
                                                                @foreach ($resepItem->detailResep as $detail)
                                                                    <li>{{ $detail->obat->nama_obat }} - Jumlah: {{ $detail->jumlah_obat }} - Dosis: {{ $detail->dosis }} - Keterangan: {{ $detail->keterangan }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
