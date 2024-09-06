<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokter</title>

    <!-- Include CSS and JS -->
    @include('template.head')

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
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Data Dokter</h6>
                            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahDataModal">
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
                                            <th>Nama</th>
                                            <th>Spesialis</th>
                                            <th>No. Telepon</th>
                                            <th>Tarif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Spesialis</th>
                                            <th>No. Telepon</th>
                                            <th>Tarif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($dataDokter as $dokter)
                                        <tr>
                                            <td>{{ $dokter->nama }}</td>
                                            <td>{{ $dokter->spesialis }}</td>
                                            <td>{{ $dokter->telp }}</td>
                                            <td>{{ $dokter->tarif }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#editDataModal{{$dokter->id}}"
                                                    data-id="{{ $dokter->id }}"
                                                    data-nama-dokter="{{ $dokter->nama_dokter }}"
                                                    data-spesialis="{{ $dokter->spesialis }}"
                                                    data-telepon="{{ $dokter->no_telepon }}"
                                                    data-tarif="{{ $dokter->tarif }}">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>

                                                <div class="modal fade" id="editDataModal{{$dokter->id}}" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editDataModalLabel">Edit Data Dokter</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form id="editFormModal" method="POST" action="{{ route('dokter.update', $dokter->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id" id="id">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="nama_dokter">Nama Dokter</label>
                                                                        <input type="text" class="form-control" value="{{$dokter->nama}}" id="nama_dokter" name="nama" placeholder="Masukkan Nama Dokter">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="spesialis">Spesialis</label>
                                                                        <input type="text" class="form-control" value="{{$dokter->spesialis}}" id="spesialis" name="spesialis" placeholder="Masukkan Spesialis">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_telepon">No. Telepon</label>
                                                                        <input type="text" class="form-control" id="no_telepon" value="{{$dokter->telp}}" name="telp" placeholder="Masukkan No. Telepon">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tarif">Tarif</label>
                                                                        <input type="text" class="form-control" id="tarif" name="tarif" value="{{$dokter->tarif}}" placeholder="Masukkan Tarif">
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

                                                <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $dokter->id_dokter }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <div class="modal fade" id="deleteModal-{{ $dokter->id_dokter }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('dokter.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaDokter">Nama Dokter</label>
                            <input type="text" class="form-control" id="namaDokter" name="nama" placeholder="Masukkan Nama Dokter">
                        </div>
                        <div class="form-group">
                            <label for="spesialisDokter">Spesialis</label>
                            <input type="text" class="form-control" id="spesialisDokter" name="spesialis" placeholder="Masukkan Spesialis">
                        </div>
                        <div class="form-group">
                            <label for="teleponDokter">No. Telepon</label>
                            <input type="text" class="form-control" id="teleponDokter" name="telp" placeholder="Masukkan No. Telepon">
                        </div>
                        <div class="form-group">
                            <label for="tarifDokter">Tarif</label>
                            <input type="text" class="form-control" id="tarifDokter" name="tarif" placeholder="Masukkan Tarif">
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <script src="{{asset('template/js/demo/datatables-edit.js')}}"></script>

</body>
@include('template.script')
</html>