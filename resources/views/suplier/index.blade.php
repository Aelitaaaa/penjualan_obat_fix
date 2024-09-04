
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Suplier - KLIMISTRI</title>
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
                        <h1 class="h3 mb-2 text-gray-800">Data Suplier Klinik Klimistri</h1>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahSuplierModal">
                            <i class="fas fa-fw fa-plus"></i> Tambah Suplier
                        </button>
                    </div>

                    <!-- Modal Tambah Obat -->
                    @include('suplier.create')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Suplier-Suplier</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">                       
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Suplier</th>
                                            <th>Nama Suplier</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Tanggal Penambahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($supliers as $index => $suplier)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $suplier->kode_suplier }}</td>
                                                <td>{{ $suplier->nama_suplier }}</td>
                                                <td>{{ $suplier->alamat }}</td>
                                                <td>{{ $suplier->nomor_telepon }}</td>
                                                <td>{{ $suplier->created_at }}</td>
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
