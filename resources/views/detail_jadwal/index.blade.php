<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Resep</title>
    
    <!-- Include CSS and JS -->
    @include('template.head')
    @include('template.script')
    @include('template.detailjadwal')

    <!-- Custom styles for this page -->
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/css/sb-admin-2.min.css" rel="stylesheet">

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
                <div class="d-flex justify-content-start mb-3" onclick="window.location.href='{{ route('jadwal.index') }}'">
                        <button class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</button>
                    </div>
                    <div class="calendar-container">
                        <div class="calendar-header">
                            <h5>Pilih Tanggal</h5>
                        </div>
                        <div class="calendar-header">
                            <i class="fas fa-chevron-left"></i>
                            <h5>Oktober 2024</h5>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="calendar">
                            <div class="day">S</div>
                            <div class="day">S</div>
                            <div class="day">R</div>
                            <div class="day">K</div>
                            <div class="day">J</div>
                            <div class="day">S</div>
                            <div class="day">M</div>
                            <div class="day"></div>
                            <div class="date grey-date">1</div>
                            <div class="date grey-date">2</div>
                            <div class="date grey-date">3</div>
                            <div class="date grey-date">4</div>
                            <div class="date grey-date">5</div>
                            <div class="date grey-date">6</div>
                            <div class="date grey-date">7</div>
                            <div class="date grey-date">8</div>
                            <div class="date">9</div>
                            <div class="date selected-date">10</div>
                            <div class="date">11</div>
                            <div class="date">12</div>
                            <div class="date grey-date">13</div>
                            <div class="date">14</div>
                            <div class="date">15</div>
                            <div class="date">16</div>
                            <div class="date">17</div>
                            <div class="date">18</div>
                            <div class="date">19</div>
                            <div class="date grey-date">20</div>
                            <div class="date">21</div>
                            <div class="date">22</div>
                            <div class="date">23</div>
                            <div class="date">24</div>
                            <div class="date">25</div>
                            <div class="date">26</div>
                            <div class="date grey-date">27</div>
                            <div class="date">28</div>
                            <div class="date">29</div>
                            <div class="date">30</div>
                            <div class="date">31</div>
                        </div>
                        <div class="legend">
                            <div class="practice"><span></span> Praktek</div>
                            <div class="no-practice"><span></span> Tidak Praktek</div>
                        </div>
                    </div>
                    <div class="time-container">
                        <h5>Pilih Jam</h5>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary flex-fill mr-1">09:00 - 14:00</button>
                            <button class="btn btn-outline-primary flex-fill ml-1">14:00 - 18:00</button>
                        </div>
                    </div>
                    <div class="footer-text">
                        Jadwal Janji Temu Dokter dapat dipilih dari <strong>30 hari</strong> sampai <strong>3 jam</strong> sebelum jadwal dokter praktik berakhir.
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary btn-lg">Lanjut</button>
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
