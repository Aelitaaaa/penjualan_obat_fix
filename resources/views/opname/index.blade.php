<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Opname - KLIMISTRI</title>
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
                    <h1 class="h3 mb-0 text-gray-800">Data Opname</h1>
                </div>

                  @include('opname.create')
                    <div class="card shadow mb-4">
                      <div class="card-header py-3 d-flex justify-content-between align-items-center">
                      <h6 class="m-0 font-weight-bold text-primary">Opname</h6>
                      <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahOpnameModal">
                          <span class="icon text-white-50">
                              <i class="fas fa-plus"></i>
                          </span>
                          <span class="text">Tambah Opname</span>
                      </a>
                  </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th class="text-center align-middle">No</th>
                                  <th class="text-center align-middle">Tanggal Opname</th>
                                  <th class="text-center align-middle">Nama Obat</th>
                                  <th class="text-center align-middle">Jumlah Sistem</th>
                                  <th class="text-center align-middle">Jumlah Fisik</th>
                                  <th class="text-center align-middle">Minus</th>
                                  <th class="text-center align-middle">Harga</th>
                                  <th class="text-center align-middle">Kerugian</th>
                                  <th class="text-center align-middle">Terakhir Diperbarui</th>
                                  <th class="text-center align-middle">Aksi</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th class="text-center align-middle">No</th>
                                  <th class="text-center align-middle">Tanggal Opname</th>
                                  <th class="text-center align-middle">Nama Obat</th>
                                  <th class="text-center align-middle">Jumlah Sistem</th>
                                  <th class="text-center align-middle">Jumlah Fisik</th>
                                  <th class="text-center align-middle">Minus</th>
                                  <th class="text-center align-middle">Harga</th>
                                  <th class="text-center align-middle">Kerugian</th>
                                  <th class="text-center align-middle">Terakhir Diperbarui</th>
                                  <th class="text-center align-middle">Aksi</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                @foreach ($stockOpname as $index => $stockOpnames)
                                  <tr>
                                    <td class="text-center" style="vertical-align: middle;">{{ $index + 1 }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->created_at }}</td>
                                   <td class="text-center" style="vertical-align: middle;">
                                    {{ $stockOpnames->kode_obat }} - 
                                    @if($stockOpnames->obat)
                                        {{ $stockOpnames->obat->nama_obat }}
                                    @else
                                        <span class="text-danger">Obat tidak ditemukan</span>
                                    @endif </td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->jumlah_sistem }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->jumlah_fisik }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->minus }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp. {{ number_format($stockOpnames->harga_obat, 0, ',', '.') }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp. {{ number_format($stockOpnames->total_kerugian, 0, ',', '.') }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->updated_at }}</td>
                                    <td class="text-center" style="vertical-align: middle;">  
                                      <a href="#" class="btn btn-warning btn-circle btn-sm mr-1" data-toggle="modal" data-target="#editOpnameModal{{ $stockOpnames->id_opname }}">
                                        <i class="fas fa-pen"></i>
                                     </a>
                                 
                                      <button type="button" class="btn btn-danger btn-circle mt-1 btn-sm" data-toggle="modal" data-target="#deleteOpnameModal{{ $stockOpnames->id_opname }}">
                                          <i class="fas fa-trash"></i>
                                      </button>
                                      @include('opname.delete')  
                                        
                                  </td>   </tr>  
                                  @include('opname.edit')
                                
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

