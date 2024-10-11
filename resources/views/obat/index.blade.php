<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Obat - KLIMISTRI</title>
    @include('template.head')

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
                        <h1 class="h3 mb-0 text-gray-800">Data Obat</h1>
                    </div>
                    
                    @include('obat.create', ['suplier' => $suplier])

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Obat</h6>
                            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahObatModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Obat</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle" style="width: 60px">No</th>
                                            <th class="text-center align-middle" style="width: 150px">Supplier</th>
                                            <th class="text-center align-middle" style="width: 210px">Obat</th>
                                            <th class="text-center align-middle" style="width: 140px">Stok</th>
                                            <th class="text-center align-middle" style="width: 150px">Tanggal</th>
                                            <th class="text-center align-middle" style="width: 150px">Terakhir Diperbarui</th>
                                            <th class="text-center align-middle" style="width: 140px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center align-middle" style="width: 60px">No</th>
                                            <th class="text-center align-middle" style="width: 150px">Supplier</th>
                                            <th class="text-center align-middle" style="width: 210px">Obat</th>
                                            <th class="text-center align-middle" style="width: 140px">Stok</th>
                                            <th class="text-center align-middle" style="width: 150px">Tanggal</th>
                                            <th class="text-center align-middle" style="width: 150px">Terakhir Diperbarui</th>
                                            <th class="text-center align-middle" style="width: 140px">Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($obat as $key => $obatItem)
                                            <tr>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $key + 1 }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $obatItem->suplier ? $obatItem->suplier->nama_suplier : '' }}</td>
                                                <td class="text-center"  data-toggle="modal" data-target="#detailObatModal{{ $obatItem->id_obat }}" style="vertical-align: middle; height: 100px;">{{ $obatItem->kode_obat }} - <br> {{ $obatItem->nama_obat }}</td>
                                                <td class="text-center"  data-toggle="modal" data-target="#detailObatModal{{ $obatItem->id_obat }}" style="vertical-align: middle; height: 100px;">{{ $obatItem->jumlah_obat }} - {{ $obatItem->unit }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $obatItem->created_at }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $obatItem->updated_at }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">
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
            @include('template.footer')
        </div>
    </div>
    
    @include('sweetalert::alert')
    @include('template.script')
</body>
</html>
