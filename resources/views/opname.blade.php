<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Opname - KLIMISTRI</title>
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
                        <h1 class="h3 mb-2 text-gray-800">Data Opname Klinik Klimistri</h1>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahOpnameModal">
                            <i class="fas fa-fw fa-plus"></i> Tambah Opname
                        </button>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Opname</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Nama Obat</th>
                                  <th>Jumlah Sistem</th>
                                  <th>Jumlah Fisik</th>
                                  <th>Minus</th>
                                  <th>Harga</th>
                                  <th>Kerugian</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($stockOpnames as $index => $stockOpname)
                                  <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $stockOpname->tanggal_opname }}</td>
                                    <td>{{ $stockOpname->kode_obat }}</td>
                                    <td>{{ $stockOpname->jumlah_obat }}</td>
                                    <td>{{ $stockOpname->jumlah_fisik }}</td>
                                    <td>{{ $stockOpname->minus }}</td>
                                    <td>{{ $stockOpname->harga_obat }}</td>
                                    <td>{{ $stockOpname->total_kerugian }}</td>
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

