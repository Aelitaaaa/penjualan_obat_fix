<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan Omset - KLIMISTRI</title>
    @include('template.head')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('template.navbar')
                
                <div class="container-fluid">
                    <div class="not-printed row justify-content-center">
                        <div class="col-lg">
                            <h3 class="text-center mt-3">Laporan Omset Modal dan Keuntungan</h3>
                            <form method="GET" action="{{ route('omset.index') }}">
                                <div class="row">
                                    <div class="col-lg mt-4">
                                        <div class="form-group">
                                            <label for="dari_tanggal">Dari Tanggal</label>
                                            <input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="{{ isset($start) ? $start->format('Y-m-d') : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg mt-4">
                                        <div class="form-group">
                                            <label for="sampai_tanggal">Sampai Tanggal</label>
                                            <input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="{{ isset($end) ? $end->format('Y-m-d') : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2 mb-5 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary"> Lihat Laporan</button>
                                </div>
                              
                            </form>
                        </div>
                    </div>
                    @if ($start && $end)
                    <button class="btn btn-success dropdown-toggle mb-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export (XLSX)
                      </button>
                      <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('modal.export', ['dari_tanggal' => isset($start) ? $start->format('Y-m-d') : '', 'sampai_tanggal' => isset($end) ? $end->format('Y-m-d') : '']) }}">HPP Export Excel (XLSX)</a>
                        <a class="dropdown-item" href="{{ route('omset.export', ['dari_tanggal' => isset($start) ? $start->format('Y-m-d') : '', 'sampai_tanggal' => isset($end) ? $end->format('Y-m-d') : '']) }}">Omset Export Excel (XLSX)</a>
                        <a class="dropdown-item" href="{{ route('laba.export', ['dari_tanggal' => isset($start) ? $start->format('Y-m-d') : '', 'sampai_tanggal' => isset($end) ? $end->format('Y-m-d') : '']) }}">Laba Kotor Export Excel (XLSX)</a>
                      </div>

                        <div class="row m-1 mb-8">
                            
                            <div class="col-lg m-1">
                                <h4 class="text-center mb-3 mt-2">Laporan Pembelian</h4>
                                <h6 class="text-center mb-3">Dari Tanggal {{ $start->format('d-m-Y') }} Sampai Tanggal {{ $end->format('d-m-Y') }}</h6>
                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">No.</th>
                                                <th class="text-center align-middle">Tanggal</th>
                                                <th class="text-center align-middle">Kode Pembelian</th>
                                                <th class="text-center align-middle">Total Pembelian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_pembelian as $index => $pembelian)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $index + 1 }}</td>
                                                    <td class="text-center align-middle">{{ $pembelian->created_at }}</td>
                                                    <td class="text-center align-middle">{{ $pembelian->kode_pembelian }}</td>
                                                    <td class="text-center align-middle">{{ number_format($pembelian->total_pembelian, 0, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                  
                            </div>
                            <div class="col-lg m-1">
                                <h4 class="text-center mb-3 mt-2">Laporan Penjualan</h4>
                                <h6 class="text-center mb-3">Dari Tanggal {{ $start->format('d-m-Y') }} Sampai Tanggal {{ $end->format('d-m-Y') }}</h6>
                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                               <th class="text-center align-middle">No.</th>
                                               <th class="text-center align-middle">Tanggal</th>
                                               <th class="text-center align-middle">Kode Penjualan</th>
                                               <th class="text-center align-middle">Total Penjualan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_penjualan as $index => $penjualan)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $index + 1 }}</td>
                                                    <td class="text-center align-middle">{{ $penjualan->created_at }}</td>
                                                    <td class="text-center align-middle">{{ $penjualan->kode_resep }}</td>
                                                    <td class="text-center align-middle">{{ number_format($penjualan->total, 0, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            
                            
                        </div>
                        <div class="row mx-1 mb-9 mt-0 pb-xl-3">
                            <div class="col-lg-3">
                                <div class="p-3 rounded bg-success total text-center" id="total_modal" name="total_modal">
                                    HPP: Rp. {{ number_format($total_modal, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="col-lg-3 ml-auto">
                                <div class="p-3 rounded bg-success total text-center" id="total_keuntungan" name="total_keuntungan">
                                    Omset: Rp. {{ number_format($omset, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="col-lg-3 ml-auto">
                                <div class="p-3 rounded bg-success total text-center" id="total_keuntungan" name="total_keuntungan">
                                    Laba Kotor: Rp.  {{ number_format($laba, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @include('template.footer')
        </div>
    </div>
    @include('sweetalert::alert')
    @include('template.script')
</body>
</html>
