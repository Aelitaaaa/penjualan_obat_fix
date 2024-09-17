<div class="modal fade text-left" id="tambahPasienModal" tabindex="-1" role="dialog" aria-labelledby="tambahPasienModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('pasien.store') }}">
         @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPasienModalLabel">Tambah Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" id="pria" name="jenis_kelamin" value="pria" {{ old('jenis_kelamin') == 'pria' ? 'checked' : '' }}>
                        <label for="pria">Pria</label> |
                        <input type="radio" id="wanita" name="jenis_kelamin" value="wanita" {{ old('jenis_kelamin') == 'wanita' ? 'checked' : '' }}>
                        <label for="wanita">Wanita</label>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" id="nomor_telepon" name="nomor_telepon" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea type="text" id="alamat" name="alamat" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-primary" name=""><i class="fas fa-fw fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

