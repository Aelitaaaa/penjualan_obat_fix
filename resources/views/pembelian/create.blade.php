<!-- Modal Tambah Obat -->
<div class="modal fade text-left" id="tambahPembelianModal" tabindex="-1" role="dialog" aria-labelledby="tambahPembelianModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('pembelian.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPembelianModalLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Pembelian</label>
                        <input type="text" name="kode_pembelian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Suplier</label>
                        <input type="text" name="kode_suplier" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" name="total_pembelian" class="form-control" placeholder="Rp." readonly>
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
@include('template.script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Ketika kode obat berubah
    $('#kode_obat').change(function() {
        var selectedOption = $(this).find('option:selected');
        var namaObat = selectedOption.data('nama');
        var hargaObat = selectedOption.data('harga');

        // Isi field nama_obat, harga_obat, dan unit
        $('#nama_obat').val(namaObat);
        $('#harga_obat').val(hargaObat);

        // Reset nilai total harga
        $('#subtotal').val('');

        // Jika jumlah sudah diisi, hitung total harga
        var jumlah = $('#jumlah_obat').val();
        if (jumlah) {
            var totalHarga = hargaObat * jumlah;
            $('#subtotal').val(totalHarga);
        }
    });

    // Ketika jumlah obat diinput
    $('#jumlah_obat').on('input', function() {
        var hargaObat = $('#harga_obat').val();
        var jumlah = $(this).val();

        // Hitung total harga
        var totalHarga = hargaObat * jumlah;
        $('#subtotal').val(totalHarga);
    });
});

</script>
