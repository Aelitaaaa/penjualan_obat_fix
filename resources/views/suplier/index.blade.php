
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Supplier - KLIMISTRI</title>
    @include('template.head')
    @include('template.script')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('template.navbar')

                <div class="container-fluid">

                    <!-- Modal Tambah Supplier -->
                    @include('suplier.create')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Data Supplier</h6>
                            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahSuplierModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Supplier</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">                       
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle" style="width: 40px">No</th>
                                            <th class="text-center align-middle" style="width: 150px">Kode Supplier</th>
                                            <th class="text-center align-middle" style="width: 150px">Nama Supplier</th>
                                            <th class="text-center align-middle" style="width: 150px">Alamat</th>
                                            <th class="text-center align-middle" style="width: 150px">Nomor Telepon</th>
                                            <th class="text-center align-middle" style="width: 130px">Tanggal Penambahan</th>
                                            <th class="text-center align-middle" style="width: 130px">Terakhir Diperbarui</th>
                                            <th class="text-center align-middle" style="width: 100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($supliers as $index => $suplier)
                                            <tr>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $index + 1 }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $suplier->kode_suplier }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $suplier->nama_suplier }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $suplier->alamat }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $suplier->nomor_telepon }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $suplier->created_at }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $suplier->updated_at }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">   
                                                    <a href="#" class="btn btn-warning btn-circle btn-sm mr-1" data-toggle="modal" data-target="#editSuplierModal{{ $suplier->id_suplier }}">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteSuplierModal{{ $suplier->id_suplier }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    @include('suplier.delete')  
                                                </td>   
                                            </tr>
                                            @include('suplier.edit') 
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
