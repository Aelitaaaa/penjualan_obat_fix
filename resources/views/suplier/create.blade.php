<!-- Modal Tambah Suplier -->

<div class="modal fade text-left" id="tambahSuplierModal" tabindex="-1" role="dialog" aria-labelledby="tambahSuplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('suplier.store') }}" onsubmit="return validateForm()">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSuplierModalLabel">Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Supplier</label>
                        <input type="text" name="kode_suplier" class="form-control" value="{{ $newKode }}" readonly>
                    </div>                    
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" id="nama_suplier" name="nama_suplier" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea type="text" id="alamat" name="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" id="nomor_telepon" name="nomor_telepon" class="form-control" required>
                        <small id="nomor_telepon_error" class="form-text text-danger" style="display:none;">
                           Masukkan nomor telepon dengan benar.
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i>Simpan</button>
                </div>
            </div>
        </form>
        
        <script>
            function validateForm() {
                var nomorTelepon = document.getElementById('nomor_telepon').value;
                var errorMessage = document.getElementById('nomor_telepon_error');
        
                if (!nomorTelepon.startsWith('08')) {
                    errorMessage.style.display = 'block'; 
                    return false; 
                }
        
                if (nomorTelepon.length < 10 || nomorTelepon.length > 13) {
                    errorMessage.style.display = 'block'; 
                    return false; 
                }
        
                errorMessage.style.display = 'none'; 
                return true; 
            }

            document.getElementById('nomor_telepon').addEventListener('input', function(e) {
                        if (this.value.length > 13) {
                            this.value = this.value.slice(0, 13); 
                        }
                    });
        </script>
             
    </div>
</div>