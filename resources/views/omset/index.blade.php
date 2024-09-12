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
                                            <input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="">           
                                        </div>
                                    </div>
                                    <div class="col-lg mt-4">
                                        <div class="form-group">
                                            <label for="sampai_tanggal">Sampai Tanggal</label>
                                            <input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" name="" class="btn btn-primary"> Lihat Laporan Pengeluaran</button>
                                </div>
                            </form>
                        </div>
                    </div>    
                    
                    <div class="row m-1 mb-0">
                        <div class="col-lg m-1">
                            <h2 class="text-center mb-3 mt-2">Laporan Omset</h2>
                            <h4 class="text-left mb-3">Laporan Dari Tanggal: .... Sampai Tanggal: .... </h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Pembelian</th>
                                            <th>Kode Pembelian</th>
                                            <th>Total Pembelian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-1 mb-9 mt-0">
                        <div class="col-lg-4">
                            <div class="p-3 rounded bg-success total" id="total_modal" name="total_modal">Total Modal: Rp.</div>
                        </div>

                        <div class="col-lg-4 ml-auto">
                            <div class="p-3 rounded bg-success total" id="total_keuntungan" name="total_keuntungan">Total keuntungan: Rp.</div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    @include('template.script')
</body>

</html>
