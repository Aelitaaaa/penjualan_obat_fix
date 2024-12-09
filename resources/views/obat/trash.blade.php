<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Obat - KLIMISTRI</title>
    @include('template.head')

</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
              

                <!-- Pesan suksess
                p@if (session('success'))
                <div class="alert alert-success">
                p { { session('success') }}
                </div>
                p@endif 

                p@if (session('error'))
                <div class="alert alert-danger">
                { { session('error') }}
                </div>
                p@endif  -->

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button class="btn btn-primary mb-2 mt-4" onclick="window.location.href='{{ route('obat.index') }}'">
                            <i class="fas fa-fw fa-arrow-left"></i> Kembali</button>
                        <div class="d-flex">
                            <a class="btn btn-warning mr-2" href="{{ route('obat.restore') }}" >Restore All</i></a>
                            <a class="btn btn-danger" href="{{ route('obat.delete') }}">Delete All</a>
                        </div>
                    </div>
    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Sampah</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle" style="width: 60px">No</th>
                                            <th class="text-center align-middle" style="width: 150px">Supplier</th>
                                            <th class="text-center align-middle" style="width: 210px">Obat</th>
                                            <th class="text-center align-middle" style="width: 140px">Stok</th>
                                            <th class="text-center align-middle" style="width: 150px">Tanggal Dihapus</th>
                                            <th class="text-center align-middle" style="width: 140px">Aksi</th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        @foreach ($obat as $key => $obatItem)
                                            <tr>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $key + 1 }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $obatItem->suplier ? $obatItem->suplier->nama_suplier : '' }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $obatItem->kode_obat }} - <br> {{ $obatItem->nama_obat }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $obatItem->jumlah_obat }} - {{ $obatItem->unit }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">{{ $obatItem->deleted_at }}</td>
                                                <td class="text-center"  style="vertical-align: middle; height: 100px;">
                                                    <a class="btn btn-warning btn-circle btn-sm mr-1" href="{{ route('obat.restore', $obatItem->id_obat) }}">
                                                        <i class="fas fa-recycle"></i>
                                                    </a>
                                            
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm"data-toggle="modal" data-target="#deleteObatModal{{ $obatItem->id_obat }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button> 
                                                    <div class="modal fade" id="deleteObatModal{{ $obatItem->id_obat }}" tabindex="-1" role="dialog" aria-labelledby="deleteObatModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteObatModalLabel">Konfirmasi Hapus Data</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Hapus data obat ini secara permanen?
                                                                </div>
                                                                <div class="modal-footer">                                                          
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <form action="{{ route('obat.delete', $obatItem->id_obat) }}">
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
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