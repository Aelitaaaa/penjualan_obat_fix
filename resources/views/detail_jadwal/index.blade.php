<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Resep</title>
    
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

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                <a href="{{ route('jadwal.index') }}" class="btn btn-primary mb-3">
                                        <span class="icon text-white-50 ">
                                            <i class="fas fa-fw fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Dr. Budi santoso</h6>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Pasien</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example rows -->
                                        <tr>
                                            <td>08:00</td>
                                            <td>Dzaki</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#editDataModal">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09:00</td>
                                            <td></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#editDataModal">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10:00</td>
                                            <td></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#editDataModal">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11:00</td>
                                            <td>Dzaky</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#editDataModal">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
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

    <!-- Edit Data Modal -->
    <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editWaktu">Waktu</label>
                            <input type="text" class="form-control" id="editWaktu" readonly>
                        </div>
                        <div class="form-group">
                            <label>Daftar Obat</label>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="editable-select">
                                <option>Alfa Romeo</option>
                                <option>Audi</option>
                                <option>BMW</option>
                                <option>Citroen</option>
                            </select>
                        </div>
                        <script>
                            $('#editable-select').editableSelect();
                            $('#appendTo').editableSelect({
                            appendTo: '.modal-body'
                            });
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
</body>
</html>
