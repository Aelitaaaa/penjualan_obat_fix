<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Pasien - KLIMISTRI</title>
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
                        <h1 class="h3 mb-2 text-gray-800">Data Pasien Klinik Klimistri</h1>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPasienModal">
                            <i class="fas fa-fw fa-plus"></i> Tambah Pasien
                        </button>
                    </div>

                    <!-- Modal Tambah Pasien -->
                    @include('pasien.create')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pasien</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Pasien</th>
                                  <th>Alamat</th>
                                  <th>Tanggal Lahir</th>
                                  <th>Nomor Telepon</th>
                                  <th>Tanggal</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($pasien as $index => $pasien)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pasien->nama_pasien}}</td>
                                        <td>{{ $pasien->alamat }}</td>
                                        <td>{{ $pasien->tanggal_lahir }}</td>
                                        <td>{{ $pasien->nomor_telepon }}</td>
                                        <td></td>
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

