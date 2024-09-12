<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat - KLIMISTRI</title>
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
                        <h1 class="h3 mb-2 text-gray-800">Data Obat - Klimistri</h1>
                        <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahObatModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Obat</span>
                        </a>
                    </div>

                    @include('obat.create', ['suplier' => $suplier])

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Obat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle" style="width: 6">No</th>
                                            <th class="text-center align-middle" style="width: 15%" >Supplier</th>
                                            <th class="text-center align-middle" style="width: 21%">Obat</th>
                                            <th class="text-center align-middle" style="width: 14%">Stok</th>
                                            <th class="text-center align-middle" style="width: 15%">Tanggal </th>
                                            <th class="text-center align-middle" style="width: 15%">Terakhir Diperbarui</th>
                                            <th class="text-center align-middle" style="width: 14%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($obat as $key => $obatItem)
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">{{ $key + 1 }}</td>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">{{ $obatItem->suplier ? $obatItem->suplier->nama_suplier : '' }}</td>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">{{ $obatItem->kode_obat }} - <br> {{ $obatItem->nama_obat }}</td>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">{{ $obatItem->jumlah_obat }} - {{ $obatItem->unit }}</td>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">{{ $obatItem->created_at }}</td>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">{{ $obatItem->updated_at }}</td>
                                                <td class="text-center" style="vertical-align: middle; height: 100px;">
                                                    <a href="#" class="btn btn-info btn-circle btn-sm mr-1" data-toggle="modal" data-target="#detailObatModal{{ $obatItem->id_obat }}">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-warning btn-circle btn-sm mr-1" data-toggle="modal" data-target="#editObatModal{{ $obatItem->id_obat }}">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                   
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteObatModal{{ $obatItem->id_obat }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    @include('obat.delete')  
                                                </td>
                                            </tr>
                                            @include('obat.edit')
                                            @include('obat.detail')
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
