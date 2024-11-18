<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan</title>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Laporan</h1>
                    </div>

                    <!-- Date Filter Form -->
                    <div class="row mb-4">
                        <div class="col-lg">
                            <form method="GET" action="{{ route('laporan.index') }}">
                                <div class="row">
                                    <div class="col-lg mt-4">
                                        <div class="form-group">
                                            <label for="dari_tanggal">Dari Tanggal</label>
                                            <input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="{{ request('dari_tanggal') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg mt-4">
                                        <div class="form-group">
                                            <label for="sampai_tanggal">Sampai Tanggal</label>
                                            <input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="{{ request('sampai_tanggal') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2 mb-5 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Lihat Laporan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if ($start && $end)
                    <!-- DataTales Example -->
                        <div class="d-sm-flex align-items-center mb-4">
                            <a class="btn btn-success" href="{{ route('laporan.export', ['dari_tanggal' => request('dari_tanggal'), 'sampai_tanggal' => request('sampai_tanggal')])  }}">Export Excel (XLSX)</a>
                        </div>
   

                                <h2 class="text-center">Laporan Rawat-Jalan</h4>
                                <h3 class="text-center">Dari Tanggal {{ $start->format('d-m-Y') }} Sampai Tanggal {{ $end->format('d-m-Y') }}</h6>
                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No Laporan</th>
                                                <th>Pasien</th>
                                                <th>Dokter</th>
                                                <th>Biaya Obat</th>
                                                <th>Biaya Dokter</th>
                                                <th>Total Biaya</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $d)
                                            <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->rekamMedis->pasien->nama_pasien}}</td>
                                                <td>{{$d->rekamMedis->dokter->nama}}</td>
                                                <td>{{ number_format($d->rekamMedis->resep->detailResep->sum('total'), 0, ',', '.') }}</td>
                                                <td>{{ number_format($d->total_biaya - $d->rekamMedis->resep->detailResep->sum('total'), 0, ',', '.') }}</td>
                                                <td>{{ number_format($d->total_biaya, 0, ',', '.') }}</td>
                                                <td>{{ $d->created_at->format('Y-m-d') }}</td>
    
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
              
                    @endif
                </div>

                <!-- /.container -fluid -->

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

    
    <!-- Custom scripts for all pages-->
    @include('template.script')
    
    <!-- Scripts for DataTables -->
    <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        // Apply editable select to all elements with class 'editable-select'
        $('.editable-select').editableSelect();
    </script>
    
</body>
</html>