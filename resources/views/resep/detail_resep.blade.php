<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian - KLIMISTRI</title>
    @include('template.head')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahDataModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Jumlah Obat</th>
                            <th>Keterangan</th>
                            <th>Harga Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Jumlah Obat</th>
                            <th>Keterangan</th>
                            <th>Harga Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($detailResep as $re)
                        <tr>
                            <td>{{ $re->kode_obat }}</td>
                            <td>{{ $re->jumlah_obat }}</td>
                            <td>{{ $re->keterangan }}</td>
                            <td>{{ $re->harga_satuan }}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal{{ $re->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal{{ $re->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteSuplierModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteSuplierModalLabel">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data Resep ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('detail_resep.destroy', $re->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Detail Resep</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('detail_resep.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kode_obat">Kode Obat</label>
                            <select id="kode_obat" name="kode_obat" class="form-control">
                                <option value="">Nama Obat - Stok</option>
                                @foreach ($obat as $obatItem)
                                    <option value="{{ $obatItem->kode_obat }}" data-nama="{{ $obatItem->kode_obat }}" data-harga="{{ $obatItem->harga_jual }}">
                                        {{ $obatItem->kode_obat }} - {{ $obatItem->jumlah_obat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="kode_resep" value="{{ $kodeResep }}" />
                        <div class="form-group">
                            <label for="jumlah">Jumlah Pembelian</label>
                            <input type="number" id="jumlah" name="jumlah_obat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_satuan">Harga /Unit</label>
                            <input type="number" id="harga_satuan" name="harga_satuan" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="subtotal">Subtotal</label>
                            <input type="number" id="subtotal" name="total" class="form-control" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" id="keterangan" name="keterangan" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    @include('template.script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ketika kode obat berubah
            $('#kode_obat').change(function() {
                var selectedOption = $(this).find('option:selected');
                var hargaJual = selectedOption.data('harga');
                // Isi field harga_satuan
                $('#harga_satuan').val(hargaJual);
                // Reset nilai subtotal
                $('#subtotal').val('');
                // Jika jumlah sudah diisi, hitung total harga
                var jumlah = $('#jumlah').val();
                if (jumlah) {
                    var totalHarga = hargaJual * jumlah;
                    $('#subtotal').val(totalHarga);
                }
            });
            // Ketika jumlah obat diinput
            $('#jumlah').on('input', function() {
                var hargaJual = $('#harga_satuan').val();
                var jumlah = $(this).val();
                // Hitung total harga
                if (hargaJual && jumlah) {
                    var totalHarga = hargaJual * jumlah;
                    $('#subtotal').val(totalHarga);
                } else {
                    $('#subtotal').val('');
                }
            });
        });
    </script>
</body>
</html>
