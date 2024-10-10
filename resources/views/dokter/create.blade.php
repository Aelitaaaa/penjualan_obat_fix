<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('dokter.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaDokter">Nama Dokter</label>
                        <input type="text" class="form-control" id="namaDokter" name="nama" placeholder="Masukkan Nama Dokter">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis</label><br>
                        <input type="radio" id="umum" name="jenis" value="umum" {{ old('jenis') == 'umum' ? 'checked' : '' }}>
                        <label for="umum">Umum</label> |
                        <input type="radio" id="spesialis" name="jenis" value="spesialis" {{ old('jenis') == 'spesialis' ? 'checked' : '' }}>
                        <label for="spesialis">Spesialis</label>
                    </div>
                    <div class="form-group">
                        <label for="spesialisDokter">Spesialis</label>
                        <input type="text" class="form-control" id="spesialisDokter" name="spesialis" placeholder="Masukkan Spesialis">
                    </div>
                    <div class="form-group">
                        <label for="teleponDokter">No. Telepon</label>
                        <input type="text" class="form-control" id="teleponDokter" name="telp" placeholder="Masukkan No. Telepon">
                    </div>
                    <div class="form-group">
                        <label for="tarifDokter">Tarif</label>
                        <input type="text" class="form-control" id="tarifDokter" name="tarif" placeholder="Masukkan Tarif">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>