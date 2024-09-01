<!-- Modal Tambah Obat -->
<div class="modal fade text-left" id="tambahObatModal" tabindex="-1" role="dialog" aria-labelledby="tambahObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('obat.store') }}">
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
                        <label>Nama Suplier</label>
                        <select name="kode_suplier" class="form-control">
                            <option value="">-Pilih-</option>
                            @foreach ($suplier as $suplierItem)
                                <option value="{{ $suplierItem->kode_suplier }}">{{ $suplierItem->nama_suplier }}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label>Kode Obat</label>
                        <select id="kode_obat" name="kode_obat" class="form-control">
                            <option value="">-Pilih-</option>
                            @foreach ($obat as $obatItem)
                                <option value="{{ $obatItem->kode_obat }}" data-nama="{{ $obatItem->nama_obat }}" data-harga="{{ $obatItem->harga_obat }}" data-unit="{{ $obatItem->Satuan }}">
                                    {{ $obatItem->kode_obat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" id="nama_obat" name="nama_obat" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" id="harga_obat" name="harga" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" id="jumlah_obat" name="jumlah" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <input type="text" id="unit" name="unit" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" id="total_harga_obat" name="total_harga" class="form-control" required readonly>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Ketika kode obat berubah
    $('#kode_obat').change(function() {
        var selectedOption = $(this).find('option:selected');
        var namaObat = selectedOption.data('nama');
        var hargaObat = selectedOption.data('harga');
        var unit = selectedOption.data('unit');

        // Isi field nama_obat, harga_obat, dan unit
        $('#nama_obat').val(namaObat);
        $('#harga_obat').val(hargaObat);
        $('#unit').val(unit);

        // Reset nilai total harga
        $('#total_harga_obat').val('');

        // Jika jumlah sudah diisi, hitung total harga
        var jumlah = $('#jumlah_obat').val();
        if (jumlah) {
            var totalHarga = hargaObat * jumlah;
            $('#total_harga_obat').val(totalHarga);
        }
    });

    // Ketika jumlah obat diinput
    $('#jumlah_obat').on('input', function() {
        var hargaObat = $('#harga_obat').val();
        var jumlah = $(this).val();

        // Hitung total harga
        var totalHarga = hargaObat * jumlah;
        $('#total_harga_obat').val(totalHarga);
    });
});

</script>
