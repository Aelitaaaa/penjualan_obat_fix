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
                            <form method="GET" action="{{route('omset.index')}}">
                                <div class="row">
                                    <div class="col-lg mt-4">
                                        <div class="form-group">
                                            <label for="dari_tanggal">Dari Tanggal</label>
                                            <input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="{{ $start ?? '' }}">           
                                        </div>
                                    </div>
                                    <div class="col-lg mt-4">
                                        <div class="form-group">
                                            <label for="sampai_tanggal">Sampai Tanggal</label>
                                            <input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="{{ $end ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary"> Lihat Laporan</button>
                                </div>
                            </form>
                        </div>
                    </div>    
                    @if($start && $end)
                    <div class="row m-1 mb-0">
                        <div class="col-lg m-1">
                            <h2 class="text-center mb-3 mt-2">Laporan Omset</h2>
                            <h4 class="text-center mb-3">Dari Tanggal {{ $start->format('d-m-Y') }} Sampai Tanggal {{ $end->format('d-m-Y') }} </h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Kode Pembelian</th>
                                            <th>Kode Pembelian</th>
                                            <th>Total Pembelian</th>
                                        </tr>
                                        <tbody>
                                            @foreach($data as $index => $pembelian)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $pembelian->created_at }}</td>
                                                    <td>{{ $pembelian->kode_pembelian }}</td>
                                                    <td>{{ $pembelian->kode_pembelian }}</td> <!-- Mungkin kolom ini seharusnya berbeda -->
                                                    <td>{{ number_format($pembelian->total_pembelian, 0, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-1 mb-9 mt-0">
                        <div class="col-lg-4">
                            <div class="p-3 rounded bg-success total" id="total_modal" name="total_modal"> Total Modal: Rp. {{ number_format($total_modal, 0, ',', '.') }}</div>
                        </div>

                        <div class="col-lg-4 ml-auto">
                            <div class="p-3 rounded bg-success total" id="total_keuntungan" name="total_keuntungan"> Total Keuntungan: Rp. </div>
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
