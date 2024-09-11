<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rekam Medis</title>

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

                <!-- Topbar Navbar -->
                @include('template.navbar')

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
                                            <th>No Rekam Medis</th>
                                            <th>Pasien</th>
                                            <th>Dokter</th>
                                            <th>Jadwal</th>
                                            <th>Keluhan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No Rekam Medis</th>
                                            <th>Pasien</th>
                                            <th>Dokter</th>
                                            <th>Jadwal</th>
                                            <th>Keluhan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- Example rows -->
                                        @foreach ($rekamMedis as $r)
                                            <tr>
                                                <th>{{$r->id }}</th>
                                                <th>{{$r->pasien->nama_pasien}}</th>
                                                <th>{{$r->dokter->nama}}</th>
                                                <th></th>
                                                <th>{{$r->diagnosis}}</th>
                                                <th><a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal"
                                                        data-target="#editDataModal{{$r->id}}">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                                                        data-target="#deleteModal{{$r->id}}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </th>

                                            </tr>
                                            <div class="modal fade" id="deleteModal{{ $r->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="deleteSuplierModalLabel" aria-hidden="true">
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
                                                            Apakah Anda yakin ingin menghapus data Rekam Madis ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <form action="{{ route('rekammedis.destroy', $r->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="editDataModal{{$r->id}}" tabindex="-1" role="dialog"
                                                aria-labelledby="editDataModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editDataModalLabel">Edit Data Rekam
                                                                Medis</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('rekammedis.update', $r->id)}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="editNamaPasien">Pasien</label>
                                                                    <select name="id_pasien" class="form-control"
                                                                        id="namaDokter">
                                                                        @foreach($pasienEdit as $p)
                                                                            <option value="{{$p->id_pasien}}"
                                                                                {{$p->id_pasien === $r->id_pasien ? 'selected' : ''}}>{{$p->nama_pasien}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="editNamaDokter">Dokter</label>
                                                                    <select name="id_dokter" class="form-control"
                                                                        id="namaDokter">
                                                                        @foreach($dokter as $d)
                                                                            <option value="{{$d->id}}" {{$d->id === $r->id_dokter ? 'selected' : ''}}>{{$d->nama}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="editIdJadwal">Jadwal</label>
                                                                    <select class="form-control" id="idJadwal">
                                                                        <option>20200101</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Diagnosis</label>
                                                                    <textarea class="form-control" id="idJadwal"
                                                                        name="diagnosis">{{$r->diagnosis}}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tindakan</label>
                                                                    <textarea class="form-control" id="idJadwal"
                                                                        name="tindakan">{{$r->tindakan}}</textarea>
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
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Rekam Medis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('rekammedis.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaPasien">Pasien</label>
                            <select name="id_pasien" class="form-control" id="namaDokter">
                                @foreach($pasien as $p)
                                    <option value="{{$p->id_pasien}}">{{$p->nama_pasien}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namaDokter">Dokter</label>
                            <select name="id_dokter" class="form-control" id="namaDokter">
                                @foreach($dokter as $d)
                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idJadwal">Jadwal</label>
                            <select class="form-control" id="idJadwal">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Diagnosis</label>
                            <textarea class="form-control" id="idJadwal" name="diagnosis"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tindakan</label>
                            <textarea class="form-control" id="idJadwal" name="tindakan"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Tambah Data Modal -->

    <!-- Modal Edit -->

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
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript -->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages -->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>

</body>

</html>