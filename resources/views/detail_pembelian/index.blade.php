    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Pembelian - KLIMISTRI</title>
        @include('template.head')
        @include('template.script')
    </head>
    <body id="page-top">
        <div id="wrapper">
            @include('template.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
            
                    <div class="container-fluid">
                        <button class="btn btn-primary mb-4 mt-4" onclick="window.location.href='{{ route('pembelian.index') }}'">
                            <i class="fas fa-fw fa-arrow-left"></i> Kembali</button>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-2 text-gray-800">Kode Pembelian: {{ $pembelian->kode_pembelian }} -  {{ $pembelian->suplier ? $pembelian->suplier->nama_suplier : ''}} ( {{ $pembelian->kode_suplier }} )</h1>
                        </div>

                        <!-- Modal Tambah Obat -->
                        @include('detail_pembelian.create', ['obat' => $obat]) 

                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
                                <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahObatModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Obat</span>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">No</th>
                                                <th class="text-center align-middle">Obat</th>
                                                <th class="text-center align-middle">Jumlah</th>
                                                <th class="text-center align-middle">Harga Satuan</th>
                                                <th class="text-center align-middle">Subtotal</th>
                                                <th class="text-center align-middle">Tanggal Pembelian</th>
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detailPembelian as $key => $item)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>   
                                                    <td class="text-center">{{ $item->obat->kode_obat }} - {{ $item->obat->nama_obat }}</td>
                                                    <td class="text-center">{{ $item->jumlah }}</td>
                                                    <td class="text-center">Rp. {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                                    <td class="text-center">Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                                    <td class="text-center">{{ $item->created_at}}</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('detail_pembelian.destroy', $item->id_detail_pembelian) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center" colspan="4">Total Pembelian:</th>
                                                <th colspan="3">Rp. {{ number_format($totalHarga, 0, ',', '.') }}</th>
                                            </tr>
                                        </tfoot>
                                                                          
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('template.footer')
            </div>
        </div>
        @include('template.script')
    </body>
    </html>
