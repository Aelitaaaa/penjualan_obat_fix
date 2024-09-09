<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian - KLIMISTRI</title>
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
                        <h1 class="h3 mb-2 text-gray-800">Kode Pembelian: {{ $pembelian->kode_pembelian }} </h1>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahObatModal">
                            <i class="fas fa-fw fa-plus"></i> Tambah Obat
                        </button>
                    </div>

                     <!-- Modal Tambah Obat -->
                     @include('detail_pembelian.create', ['obat' => $obat]) 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Obat</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Subtotal</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detailPembelian as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>           
                                                <td>{{ $item->kode_obat }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>{{ $item->harga_satuan }}</td>              
                                                <td>{{ $item->subtotal }}</td>
                                               
                                                <td>{{ $item->create_at}}</td>
                                                <td>
                                                    {{-- <a href="{{ route('detail_pembelian.index', $item->id_pembelian) }}" class="btn btn-warning btn-sm">Detail</a> --}}
                                                    <form action="{{ route('detail_pembelian.destroy', $item->id_detail_pembelian) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <td colspan="4"> Total: </td>
                                        <td>hh</td>
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
