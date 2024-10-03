<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Resep</title>

    <!-- Include CSS and JS -->
    @include('template.head')

    <!-- Custom fonts for this template -->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('template/css/sb-admin-2.css')}}" rel="stylesheet">

    @include('template.script')

    <!-- Custom styles for this page -->
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    @include('template.navbar')
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Data Resep</h6>
                            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal"
                                data-target="#tambahDataModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Resep</th>
                                            <th>Nama Resep</th>
                                            <th>Daftar Obat</th>
                                            <th>ID Rekammedis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Resep</th>
                                            <th>Nama Resep</th>
                                            <th>Daftar Obat</th>
                                            <th>ID Rekammedis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- Example rows -->
                                        @foreach ($resep as $re)
                                        <tr>
                                            <th>{{$re->kode_resep }}</th>
                                            <th>{{$re->nama_resep}}</th>
                                            <th>{{$re->nama_obat}}</th>
                                            <th>{{$re->rekamMedis->id}}</th>
                                          
                                            <th>
                                            <a href="#" class="btn btn-info btn-circle btn-sm mr-1" data-toggle="modal" data-target="#detailResepModal{{ $re->kode_resep }}">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                <a href="#" class="btn btn-warning btn-circle btn-sm mr-1" data-toggle="modal"
                                                    data-target="#editDataModal{{$re->kode_resep}}">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-circle btn-sm"
                                                    data-toggle="modal" data-target="#deleteModal{{$re->kode_resep}}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </th>

                                        </tr>
                                        <div class="modal fade" id="deleteModal{{ $re->kode_resep}}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteSuplierModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteSuplierModalLabel">Konfirmasi
                                                            Hapus Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data Resep ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('resep.destroy', $re->kode_resep) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="editDataModal{{$re->kode_resep}}" tabindex="-1"
                                            role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editDataModalLabel">Edit Data Resep
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('resep.update', $re->kode_resep)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Nama Resep</label>
                                                                <textarea class="form-control" id="idJadwal"
                                                                    name="nama_resep">{{$re->nama_resep}}</textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="editNamaobat"></label>
                                                                <select name="nama_obat" class="form-control"
                                                                    id="namaDokter">
                                                                    @foreach($obat as $o)
                                                                    <option value="{{$o->nama_obat}}"
                                                                        {{$o->nama_obat === $re->nama_obat ? 'selected' : ''}}>{{$o->nama_obat}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editidrekammedis">Dokter</label>
                                                                <select name="id_rekam_medis" class="form-control"
                                                                    id="namaDokter">
                                                                    @foreach($rekamMedis as $r)
                                                                    <option value="{{$r->id}}"
                                                                        {{$r->id === $re->id_rekammedis ? 'selected' : ''}}>{{$r->id}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                       @include('detailresep')
                                        @endforeach
                                        <!-- More rows can be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Tambah Data Modal -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Resep</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('resep.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- <div class="form-group">
                            <label for="koderesep">Kode Resep</label>
                            <input type="text" class="form-control" id="koderesep" name="kode"
                                placeholder="Masukkan Kode Resep">
                        </div> -->
                            <div class="form-group">
                                <label for="namaresep">Nama Resep</label>
                                <input type="text" class="form-control" id="namaresep" name="nama_resep"
                                    placeholder="Masukkan Nama Resep">
                            </div>

                            <div class="form-group">
                                <label for="namaObat">Nama Obat</label>
                                <select name="nama_obat" class="form-control" id="namaObat">
                                    @foreach($obat as $o)
                                    <option value="{{$o->nama_obat}}">{{$o->nama_obat}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="idRekammedis">Rekam Medis</label>
                                <select name="id_rekam_medis" class="form-control" id="idRekammedis">
                                    @foreach($rekamMedis as $r)
                                    <option value="{{$r->id}}">{{$r->id}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- <div class="form-group">
                                <label>Daftar Obat</label>
                                <textarea class="form-control" id="idJadwal" name="daftar_obat"></textarea>
                            </div>
                        </div> -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <!-- End of Edit Data Modal -->

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @include('template.script')
</body>

</html>