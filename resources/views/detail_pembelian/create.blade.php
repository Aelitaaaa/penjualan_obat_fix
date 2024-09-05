<!-- Modal Tambah Obat -->
<div class="modal fade text-left" id="tambahObatModal" tabindex="-1" role="dialog" aria-labelledby="tambahObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('detail_pembelian.store', ['kodePembelian' => $pembelian->kode_pembelian]) }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahObatModalLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Obat</label>
                        <select id="kode_obat" name="kode_obat" class="form-control">
                            <option value="">Nama Obat - Stok</option>
                            @foreach ($obat as $obatItem)
                                <option value="{{ $obatItem->kode_obat }}" data-nama="{{ $obatItem->nama_obat }}" data-harga="{{ $obatItem->harga_jual }}">
                                    {{ $obatItem->nama_obat }} - {{ $obatItem->jumlah_obat }}
                                </option>
                            @endforeach
                        </select>                     
                    </div>
                    <div class="form-group">
                        <label>Jumlah Pembelian</label>
                        <input type="number" id="jumlah_pembelian" name="jumlah_pembelian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" id="harga_jual" name="harga_jual" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Subtotal</label>
                        <input type="number" id="subtotal" name="subtotal" class="form-control" required readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
                </div>
            </div>
        </form>
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
            var namaObat = selectedOption.data('nama');
            var hargaJual = selectedOption.data('harga');

            // Isi field harga_jual
            $('#harga_jual').val(hargaJual);

            // Reset nilai subtotal
            $('#subtotal').val('');

            // Jika jumlah sudah diisi, hitung total harga
            var jumlah = $('#jumlah_pembelian').val();
            if (jumlah) {
                var totalHarga = hargaJual * jumlah;
                $('#subtotal').val(totalHarga);
            }
        });

        // Ketika jumlah obat diinput
        $('#jumlah_pembelian').on('input', function() {
            var hargaJual = $('#harga_jual').val();
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

