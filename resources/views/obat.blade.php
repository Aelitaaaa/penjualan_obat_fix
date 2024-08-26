<!DOCTYPE html>
<html lang="en">

<head>
    <title>APPKAS - Data Obat</title>
    @include('template.head')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('template.navbar')

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Data Obat Klinik Klimistri</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Obat-Obat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Kode suplier</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Total Harga</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($obat as $obat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $obat->kode_obat }}</td>
                                            <td>{{ $obat->kode_suplier }}</td>
                                            <td>{{ $obat->nama_obat }}</td>
                                            <td>{{ $obat->harga_obat }}</td>
                                            <td>{{ $obat->jumlah_obat }}</td>
                                            <td>{{ $obat->Satuan }}</td>
                                            <td>{{ $obat->total_harga_obat }}</td>
                                            <td>{{ $obat->tanggal }}</td>
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
