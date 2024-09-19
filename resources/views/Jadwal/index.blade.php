<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal</title>
    
    <!-- Include CSS and JS -->
    @include('template.head')
    @include('template.script')

    <!-- Custom styles for this page -->
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <style>
.day-picker .day-btn {
    width: 80px;      
    padding: 10px 15px;
    border-radius: 10px;      
    text-align: center;
    margin-right: 10px;
}

.day-picker .day-btn .text-small {
    font-size: 12px;       
}

.day-picker .day-btn .font-weight-bold {
    font-size: 16px;       
}


.time-grid {
    display: flex;
    gap: 20px; 
    flex-wrap: wrap; 
}

.time-box {
    display: inline-block;
    padding: 10px 15px;
    border-radius: 8px;
    border: 1px solid #ced4da;
    width: 80px;
    text-align: center;
    margin-top: 5px; 
    margin-bottom: 5px;  
}

.time-box.available {
    background-color: #ffffff;  
    color: #6c757d;            
}

.time-box.unavailable {
    background-color: #f56c6c; 
    color: #ffffff;    
}



    </style>
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
    <form method="GET" action="{{ route('jadwal.index') }}">
        <label for="minggu">Pilih Minggu:</label>
        <input type="date" name="minggu" id="minggu" value="{{ request('minggu', now()->startOfWeek()->format('Y-m-d')) }}">
        <button type="submit">Lihat Jadwal</button>
    </form>    

    <!-- Tombol Hari -->
            <div class="day-picker d-flex mb-4 d-none">
            <button data-hari="Senin" class="day-btn btn btn-outline-primary active" onclick="selectDay(this)">
                <div class="text-small"></div>
                <div class="font-weight-bold">SEN</div>
            </button>
            <button data-hari="Selasa" class="day-btn btn btn-outline-primary" onclick="selectDay(this)">
                <div class="text-small"></div>
                <div class="font-weight-bold">SEL</div>
            </button>
            <button data-hari="Rabu" class="day-btn btn btn-outline-primary" onclick="selectDay(this)">
                <div class="text-small"></div>
                <div class="font-weight-bold">RAB</div>
            </button>
            <button data-hari="Kamis" class="day-btn btn btn-outline-primary" onclick="selectDay(this)">
                <div class="text-small"></div>
                <div class="font-weight-bold">KAM</div>
            </button>
            <button data-hari="Jumat" class="day-btn btn btn-outline-primary" onclick="selectDay(this)">
                <div class="text-small"></div>
                <div class="font-weight-bold">JUM</div>
            </button>
        </div>



    <!-- Daftar Jadwal Dokter -->
            <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dokter</th>
                                <th>Spesialis</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dokters as $dokter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dokter->nama }}</td>
                                    <td>{{ $dokter->spesialis }}</td>
                                    <td>
                                        @foreach($dokter->jadwals->whereBetween('tanggal', [$mingguAwal, $mingguAkhir]) as $jadwal)
                                            {{ $jadwal->waktu }} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('detail_jadwal.index', ['dokter' => $dokter->id_dokter]) }}" class="btn btn-primary">Detail Jadwal</a>
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
                            <label for="date">Tanggal</label>
                            <input type="date" class="form-control" id="date">
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
                            <label for="time">Waktu</label>
                            <input type="time" class="form-control" id="time">
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
    function selectDay(element) {
    // Hapus class 'active' dari semua tombol dan kembalikan menjadi 'btn-outline-primary'
    const buttons = document.querySelectorAll('.day-btn');
    buttons.forEach(btn => {
        btn.classList.remove('active');
        btn.classList.remove('btn-primary');
        btn.classList.add('btn-outline-primary');
    });

    // Tambahkan class 'active' dan 'btn-primary' pada tombol yang di-klik
    element.classList.add('active');
    element.classList.remove('btn-outline-primary');
    element.classList.add('btn-primary');
}



function getStartDateOfWeek(week) {
    var year = parseInt(week.split('-')[0], 10);
    var weekNumber = parseInt(week.split('-')[1].substring(1), 10);
    var janFirst = new Date(year, 0, 1);
    var daysOffset = (weekNumber - 1) * 7;
    var startDate = new Date(janFirst.setDate(janFirst.getDate() + daysOffset));
    return startDate;
}

function updateDayPicker() {
    var week = document.getElementById('selectWeek').value;
    var startDate = getStartDateOfWeek(week);
    
    if (!week) return;

    var dayButtons = document.querySelectorAll('.day-picker .day-btn');
    var daysOfWeek = ['MIN', 'SEN', 'SEL', 'RAB', 'KAM', 'JUM', 'SAB'];
    var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    
    dayButtons.forEach((button, index) => {
        var date = new Date(startDate);
        date.setDate(date.getDate() + index);
        var day = date.getDate();
        var month = monthNames[date.getMonth()];
        var dayOfWeek = daysOfWeek[date.getDay()];
        
        button.querySelector('.text-small').textContent = `${day} ${month}`;
        button.querySelector('.font-weight-bold').textContent = dayOfWeek;
    });
}

document.getElementById('selectWeek').addEventListener('change', updateDayPicker);

// Panggil fungsi saat halaman dimuat untuk memperbarui day-picker dengan minggu awal
document.addEventListener('DOMContentLoaded', function() {
    updateDayPicker();
});




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
