<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahPasienModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Pasien</span>
                        </a>
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
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Penambahan</th>
                                            <th>Update</th>
                                            <th style="width: 9.4%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pasien as $index => $pasienItem)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pasienItem->nama_pasien }}</td>
                                                <td>{{ $pasienItem->jenis_kelamin }}</td>
                                                <td>{{ $pasienItem->tanggal_lahir }}</td>
                                                <td>{{ $pasienItem->nomor_telepon }}</td>
                                                <td>{{ $pasienItem->alamat }}</td>
                                                <td>{{ $pasienItem->created_at }}</td>
                                                <td>{{ $pasienItem->updated_at }}</td>
                                                    <td>
                                                    
                                                       
                                                        <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#editPasienModal{{ $pasienItem->id_pasien }}">
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>
                                                        @include('pasien.edit')    
                                                        <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deletePasienModal{{ $pasienItem->id_pasien }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        @include('pasien.delete')  
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
    @include('sweetalert::alert')
    @include('template.script')

</body>

</html>
