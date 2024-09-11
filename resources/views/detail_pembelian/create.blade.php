<!-- Modal Tambah Obat -->
<div class="modal fade text-left" id="tambahObatModal" tabindex="-1" role="dialog" aria-labelledby="tambahObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('detail_pembelian.store') }}">
            @csrf
            <input type="hidden" name="kode_pembelian" value="{{ $pembelian->kode_pembelian }}">
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
                                <option value="{{ $obatItem->kode_obat }}" data-nama="{{ $obatItem->nama_obat }}" data-harga="{{ $obatItem->harga_beli }}">
                                    {{ $obatItem->nama_obat }} - {{ $obatItem->jumlah_obat }}
                                </option>
                            @endforeach
                        </select>                     
                    </div>
                    <div class="form-group">
                        <label>Jumlah Pembelian</label>
                        <input type="number" id="jumlah" name="jumlah" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga /Unit</label>
                        <input type="number" id="harga_satuan" name="harga_satuan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Subtotal</label>
                        <input type="number" id="subtotal" name="subtotal" class="form-control" required readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
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
    // Fungsi untuk memformat angka dengan titik sebagai pemisah ribuan
    function formatRibuan(angka) {
        return parseInt(angka).toLocaleString('id-ID', { minimumFractionDigits: 0 });
    }

    // Ketika kode obat berubah
    $('#kode_obat').change(function() {
        var selectedOption = $(this).find('option:selected');
        var hargaJual = selectedOption.data('harga');

        // Format dan isi field harga_satuan
        $('#harga_satuan').val(formatRibuan(hargaJual));

        // Reset nilai subtotal
        $('#subtotal').val('');

        // Jika jumlah sudah diisi, hitung total harga
        var jumlah = $('#jumlah').val();
        if (jumlah) {
            var totalHarga = hargaJual * jumlah;
            $('#subtotal').val(formatRibuan(totalHarga));
        }
    });

    // Ketika jumlah obat diinput
    $('#jumlah').on('input', function() {
        var hargaJual = $('#kode_obat').find('option:selected').data('harga');
        var jumlah = $(this).val();

        // Hitung total harga
        if (hargaJual && jumlah) {
            var totalHarga = hargaJual * jumlah;
            $('#subtotal').val(formatRibuan(totalHarga));
        } else {
            $('#subtotal').val('');
        }
    });
});

</script>


