<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembayaran</title>

    <!-- Include CSS and JS -->
    @include('template.head')
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
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
                                            <th>No Pembayaran</th>
                                            <th>Pasien</th>
                                            <th>Dokter</th>
                                            <th>No Rekam Medis</th>
                                            <th>Resep</th>
                                            <th>Total Biaya</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No Pembayaran</th>
                                            <th>Pasien</th>
                                            <th>Dokter</th>
                                            <th>No Rekam Medis</th>
                                            <th>Resep</th>
                                            <th>Total Biaya</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- Example rows -->

                                            <tr>
                                                <th><th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal"
                                                        data-target="#editDataModal">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                                                        data-target="#deleteModal">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </th>

                                            </tr>
                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
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
                                                            <form action=""
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editDataModalLabel">Edit Data Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="editNamaPasien">Pasien</label>
                                                                    <select name="id_pasien" class="form-control editable-select">
                                                                        <option>Aswan</option>
                                                                        <option>Ruben</option>
                                                                        <option>Dzaki</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="editNamaDokter">Dokter</label>
                                                                    <select name="id_dokter" class="form-control editable-select">
                                                                        <option>Dr. Riva</option>
                                                                        <option>Dr. Dzaky</option>
                                                                        <option>Dr. Budi Santoso</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="editIdRekamMedis">No Rekam Medis</label>
                                                                    <select class="form-control editable-select">
                                                                        <option>20200101</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="editIdResep">Resep</label>
                                                                    <select class="form-control editable-select">
                                                                        <option>AWOK</option>
                                                                    </select>
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

                                            <script>
                                                // Apply editable select to all elements with class 'editable-select'
                                                $('.editable-select').editableSelect();
                                            </script>

                                            <!-- End of Edit Data Modal -->

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
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('rekammedis.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaPasien">Pasien</label>
                        <select name="id_pasien" class="form-control editable-select">
                            <option>Aswan</option>
                            <option>Ruben</option>
                            <option>Dzaki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaDokter">Dokter</label>
                        <select name="id_dokter" class="form-control editable-select">
                            <option>Dr. Riva</option>
                            <option>Dr. Dzaky</option>
                            <option>Dr. Budi Santoso</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editIdRekamMedis">No Rekam Medis</label>
                        <select class="form-control editable-select">
                            <option>20200101</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editIdResep">Resep</label>
                        <select class="form-control editable-select">
                            <option>AWOK</option>
                        </select>
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

<script>
    // Apply editable select to all elements with class 'editable-select'
    $('.editable-select').editableSelect();
</script>

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
</body>

</html>