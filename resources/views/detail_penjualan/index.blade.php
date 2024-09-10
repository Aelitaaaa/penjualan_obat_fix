<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan - KLIMISTRI</title>
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
                        <h1 class="h3 mb-2 text-gray-800">Kode Penjualan:  </h1>
                    </div> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Penjualan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Obat</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Subtotal</th>
                                            <th>Tanggal Penjualan</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                            <tr>
                                                <td></td>           
                                                <td></td>
                                                <td></td>
                                                <td></td>              
                                                <td></td>
                                                <td></td>
                                        
                                            </tr>
                                       
                                    </tbody>
                                    <tfoot>
                                        <td colspan="4"> Total: </td>
                                        <td colspan="2">hh</td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @include('template.script')
</body>
</html>
