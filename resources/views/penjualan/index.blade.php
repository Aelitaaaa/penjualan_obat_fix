<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjualan - KLIMISTRI</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Data Penjualan</h1>
                        <a class="btn btn-success" href="{{ route('penjualan.export') }}">Export Excel (XLSX)</a>
                    </div>
                   

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Penjualan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">No</th>
                                            <th class="text-center align-middle">Kode Resep</th>
                                            <th class="text-center align-middle">Obat</th>
                                            <th class="text-center align-middle">Jumlah Obat</th>
                                            <th class="text-center align-middle">Harga satuan</th>
                                            <th class="text-center align-middle">Total Penjualan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center align-middle">No</th>
                                            <th class="text-center align-middle">Kode Resep</th>
                                            <th class="text-center align-middle">Obat</th>
                                            <th class="text-center align-middle">Jumlah Obat</th>
                                            <th class="text-center align-middle">Harga satuan</th>
                                            <th class="text-center align-middle">Total Penjualan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($penjualan as $key => $item)
                                            <tr>
                                                <td class="text-center align-middle">{{ $key + 1 }}</td>
                                                <td class="text-center align-middle">{{ $item->kode_resep }}</td>              
                                                <td class="text-center align-middle">{{ $item->obat->nama_obat }}</td>
                                                <td class="text-center align-middle">{{ $item->jumlah_obat }}</td>
                                                <td class="text-center align-middle">{{ $item->harga_satuan }}</td>
                                                <td class="text-center align-middle">{{ $item->total }}</td>
                                            
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('template.footer')
        </div>
    </div>
    @include('sweetalert::alert')
    @include('template.script')
</body>
</html>
