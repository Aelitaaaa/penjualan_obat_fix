<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal</title>
    
    <!-- Include CSS and JS -->
    @include('template.head')

    <!-- Custom fonts for this template -->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('template/css/sb-admin-2.css')}}" rel="stylesheet">
    
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
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Dokter</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addScheduleModal">
            Tambah Jadwal
        </button>
    </div>

    <!-- Pilih Minggu -->
    <div class="mb-4">
        <label for="selectWeek">Pilih Minggu</label>
        <input type="week" class="form-control w-auto d-inline" id="selectWeek" onchange="filterScheduleByWeek()">
    </div>

    <!-- Daftar Jadwal Dokter -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Dokter</th>
                            <th>Spesialisasi</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Pasien</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleTable">
                        <!-- Jadwal dokter untuk Minggu 1 -->
                        <tr data-week="2024-W35">
                            <td rowspan="3">dr. Vina Carolina</td>
                            <td rowspan="3">Dokter Gigi Umum</td>
                            <td>Senin</td>
                            <td>08:00 - 12:00</td>
                            <td></td> <!-- Tidak ada pasien yang booking -->
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteScheduleModal">
                                    Hapus Jadwal
                                </button>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#makeAppointmentModal">
                                    Buat Jadwal
                                </button>
                            </td>
                        </tr>
                        <tr data-week="2024-W35">
                            <td style="color: red;">Rabu</td>
                            <td style="color: red;">08:00 - 12:00</td>
                            <td>John Doe</td> <!-- Pasien yang sudah booking -->
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteScheduleModal">
                                    Hapus Jadwal
                                </button>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editScheduleModal">
                                    Ubah Jadwal
                                </button>
                            </td>
                        </tr>
                        <tr data-week="2024-W35">
                            <td>Jumat</td>
                            <td>08:00 - 12:00</td>
                            <td></td> <!-- Tidak ada pasien yang booking -->
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteScheduleModal">
                                    Hapus Jadwal
                                </button>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#makeAppointmentModal">
                                    Buat Jadwal
                                </button>
                            </td>
                        </tr>
                        
                        <!-- Jadwal dokter untuk Minggu 2 -->
                        <tr data-week="2024-W36">
                            <td rowspan="3">dr. Budi Santoso</td>
                            <td rowspan="3">Dokter Spesialis Anak</td>
                            <td style="color: red;">Selasa</td>
                            <td style="color: red;">08:00 - 12:00</td>
                            <td>Jane Smith</td> <!-- Pasien yang sudah booking -->
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteScheduleModal">
                                    Hapus Jadwal
                                </button>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editScheduleModal">
                                    Ubah Jadwal
                                </button>
                            </td>
                        </tr>
                        <tr data-week="2024-W36">
                            <td>Kamis</td>
                            <td>08:00 - 12:00</td>
                            <td></td> <!-- Tidak ada pasien yang booking -->
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteScheduleModal">
                                    Hapus Jadwal
                                </button>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#makeAppointmentModal">
                                    Buat Jadwal
                                </button>
                            </td>
                        </tr>
                        <tr data-week="2024-W36">
                            <td>Sabtu</td>
                            <td>08:00 - 12:00</td>
                            <td></td> <!-- Tidak ada pasien yang booking -->
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteScheduleModal">
                                    Hapus Jadwal
                                </button>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#makeAppointmentModal">
                                    Buat Jadwal
                                </button>
                            </td>
                        </tr>

                        <!-- Tambahkan lebih banyak data dengan atribut `data-week` yang sesuai -->
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


    <!-- Modal Tambah Jadwal -->
    <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addScheduleModalLabel">Tambah Jadwal Dokter</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="week">Minggu Ke-</label>
                            <input type="week" class="form-control" id="week">
                        </div>
                        <div class="form-group">
                            <label for="doctorName">Nama Dokter</label>
                            <select class="form-control" id="doctorName">
                                <option value="">Pilih Dokter</option>
                                <!-- Tambahkan lebih banyak opsi dokter di sini -->
                                <option value="dr. Vina Carolina">dr. Vina Carolina</option>
                                <option value="dr. Budi Santoso">dr. Budi Santoso</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="specialization">Spesialisasi</label>
                            <select class="form-control" id="specialization">
                                <option value="">Pilih Spesialisasi</option>
                                <!-- Tambahkan lebih banyak opsi spesialisasi di sini -->
                                <option value="Dokter Gigi Umum">Dokter Gigi Umum</option>
                                <option value="Dokter Spesialis Anak">Dokter Spesialis Anak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="day">Hari</label>
                            <select class="form-control" id="day">
                                <option value="">Pilih Hari</option>
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jumat</option>
                                <option>Sabtu</option>
                                <option>Minggu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="time">Waktu</label>
                            <select class="form-control" id="time">
                                <option value="">Pilih Waktu</option>
                                <!-- Tambahkan lebih banyak opsi waktu di sini -->
                                <option>08:00 - 12:00</option>
                                <option>13:00 - 17:00</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="button">Simpan</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal Ubah Jadwal -->
<div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editScheduleModalLabel">Ubah Jadwal Dokter</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="editWeek">Minggu Ke-</label>
                        <input type="text" class="form-control" id="editWeek" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editDay">Hari</label>
                        <input type="text" class="form-control" id="editDay" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editTime">Waktu</label>
                        <input type="text" class="form-control" id="editTime" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editPatientName">Nama Pasien</label>
                        <select class="form-control" id="editPatientName">
                            <option value="">---</option>
                            <!-- Tambahkan lebih banyak opsi pasien di sini -->
                            <option value="John Doe">John Doe</option>
                            <option value="Jane Smith">Jane Smith</option>
                            <option value="Michael Johnson">Michael Johnson</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="button">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>



    <!-- Modal Buat Janji -->
<div class="modal fade" id="makeAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="makeAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="makeAppointmentModalLabel">Buat Janji dengan Dokter</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="appointmentWeek">Minggu Ke-</label>
                        <input type="text" class="form-control" id="appointmentWeek" readonly>
                    </div>
                    <div class="form-group">
                        <label for="appointmentDay">Hari</label>
                        <input type="text" class="form-control" id="appointmentDay" readonly>
                    </div>
                    <div class="form-group">
                        <label for="appointmentTime">Waktu</label>
                        <input type="text" class="form-control" id="appointmentTime" readonly>
                    </div>
                    <div class="form-group">
                        <label for="patientName">Nama Pasien</label>
                        <select class="form-control" id="patientName">
                            <option value="">---</option>
                            <!-- Tambahkan lebih banyak opsi pasien di sini -->
                            <option value="John Doe">John Doe</option>
                            <option value="Jane Smith">Jane Smith</option>
                            <option value="Michael Johnson">Michael Johnson</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="button">Buat Janji</button>
            </div>
        </div>
    </div>
</div>




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


    <script>
    function filterScheduleByWeek() {
        var selectedWeek = document.getElementById('selectWeek').value;
        if (!selectedWeek) return;

        var rows = document.querySelectorAll('#scheduleTable tr');

        rows.forEach(function(row) {
            if (row.getAttribute('data-week') === selectedWeek) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Panggil fungsi ini saat halaman pertama kali dimuat untuk menampilkan jadwal berdasarkan minggu saat ini
    document.addEventListener('DOMContentLoaded', function() {
        var currentWeek = new Date().toISOString().slice(0, 10);
        document.getElementById('selectWeek').value = currentWeek;
        filterScheduleByWeek();
    });
    </script>

<script>
    function filterScheduleByWeek() {
        var selectedWeek = document.getElementById('selectWeek').value;
        var rows = document.querySelectorAll('#scheduleTable tr');

        if (!selectedWeek) {
            rows.forEach(function(row) {
                row.style.display = 'none';
            });
        } else {
            rows.forEach(function(row) {
                if (row.getAttribute('data-week') === selectedWeek) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    }

    // Panggil fungsi ini saat halaman pertama kali dimuat untuk menampilkan jadwal berdasarkan minggu saat ini
    document.addEventListener('DOMContentLoaded', function() {
        filterScheduleByWeek();
    });
</script>




</body>
</html>
