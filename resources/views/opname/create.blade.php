<!-- Modal Tambah Obat -->
<div class="modal fade text-left" id="tambahOpnameModal" tabindex="-1" role="dialog" aria-labelledby="tambahOpnameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('opname.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahOpnameModalLabel">Tambah Opname</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Obat</label>
                        <select id="kode_obat" name="kode_obat" class="form-control">
                            <option value="">Obat </option>
                            @foreach ($obat as $obatItem)
                                <option value="{{ $obatItem->kode_obat }}" data-nama="{{ $obatItem->nama_obat }}" data-jumlah="{{ $obatItem->jumlah_obat }}" data-harga="{{ $obatItem->harga_beli }}">
                                    {{ $obatItem->kode_obat }} - {{ $obatItem->nama_obat }}
                                </option>
                            @endforeach
                        </select>                     
                    </div>
                    <div class="form-group">
                        <label>Jumlah Sistem</label>
                        <input type="number" id="jumlah_sistem" name="jumlah_sistem" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Fisik</label>
                        <input type="number" id="jumlah_fisik" name="jumlah_fisik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Minus</label>
                        <input type="number" id="minus" name="minus" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Harga Obat</label>
                        <input type="number" id="harga_obat" name="harga_obat" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Total Kerugian</label>
                        <input type="number" id="total_kerugian" name="total_kerugian" class="form-control" required readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
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
        var hargaBeli = selectedOption.data('harga');
        var jumlahSistem = selectedOption.data('jumlah');
        
        // Set jumlah sistem dan harga beli
        $('#jumlah_sistem').val(jumlahSistem);
        $('#harga_obat').val(hargaBeli);

        // Reset nilai minus dan total kerugian jika kode obat berubah
        $('#minus').val('');
        $('#total_kerugian').val('');
        $('#jumlah_fisik').val(''); // reset juga jumlah fisik
    });

    // Ketika jumlah fisik diubah
    $('#jumlah_fisik').on('input', function() {
        var jumlahSistem = parseFloat($('#jumlah_sistem').val());
        var jumlahFisik = parseFloat($(this).val());
        var hargaBeli = parseFloat($('#harga_obat').val());

        // Logika baru jika jumlah fisik 0, maka minus = jumlah sistem
        if (jumlahFisik === 0) {
            $('#minus').val(jumlahSistem);

            // Hitung total kerugian
            var totalKerugian = jumlahSistem * hargaBeli;
            $('#total_kerugian').val(totalKerugian);
        } else if (!isNaN(jumlahFisik) && !isNaN(jumlahSistem)) {
            var totalMinus = jumlahSistem - jumlahFisik;

            // Set nilai minus
            $('#minus').val(totalMinus);

            // Hitung total kerugian
            if (hargaBeli && totalMinus !== 0) {
                var totalHarga = hargaBeli * Math.abs(totalMinus); // Gunakan Math.abs untuk mendapatkan nilai absolut
                $('#total_kerugian').val(totalHarga);
            } else {
                $('#total_kerugian').val(0);
            }
        } else {
            $('#minus').val('');
            $('#total_kerugian').val('');
        }
    });

});

</script>



