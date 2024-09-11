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
                        <h1 class="h3 mb-2 text-gray-800">Data Opname - Klimistri</h1>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahOpnameModal">
                            <i class="fas fa-fw fa-plus"></i> Tambah Opname
                        </button>
                    </div>
                  @include('opname.create')
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
                                  <th>Terakhir Diperbarui</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($stockOpname as $index => $stockOpnames)
                                  <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $stockOpnames->created_at }}</td>
                                    <td>{{ $stockOpnames->kode_obat ? $stockOpnames->obat->nama_obat : '' }}</td>
                                    <td>{{ $stockOpnames->jumlah_sistem }}</td>
                                    <td>{{ $stockOpnames->jumlah_fisik }}</td>
                                    <td>{{ $stockOpnames->minus }}</td>
                                    <td>Rp. {{ number_format($stockOpnames->harga_obat, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($stockOpnames->total_kerugian, 0, ',', '.') }}</td>
                                    <td>{{ $stockOpnames->updated_at }}</td>
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
    @include('sweetalert::alert')
</body>

</html>

