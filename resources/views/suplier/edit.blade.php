@foreach($supliers as $suplierItem)
<div class="modal fade" id="editSuplierModal{{ $suplierItem->id_suplier }}" tabindex="-1" role="dialog" aria-labelledby="editSuplierModalLabel{{ $suplierItem->id_suplier }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSuplierModalLabel{{ $suplierItem->id_suplier }}">Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('suplier.update', $suplierItem->id_suplier) }}" method="POST" onsubmit="return validateForm{{ $suplierItem->id_suplier }}()">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="kode_suplier">Kode Supplier</label>
                        <input type="text" name="kode_suplier" class="form-control" value="{{ $suplierItem->kode_suplier }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_suplier">Nama Supplier</label>
                        <input type="text" name="nama_suplier" class="form-control" value="{{ $suplierItem->nama_suplier }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" required>{{ $suplierItem->alamat }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="number" id="nomor_telepon{{ $suplierItem->id_suplier }}" name="nomor_telepon" class="form-control" value="{{ $suplierItem->nomor_telepon }}" required>
                        <small id="nomor_telepon_error{{ $suplierItem->id_suplier }}" class="form-text text-danger" style="display:none;">
                            Masukan nomor telepon dengan benar.
                         </small>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
                <script>
                    function validateForm{{ $suplierItem->id_suplier }}() {
                        var nomorTelepon = document.getElementById('nomor_telepon{{ $suplierItem->id_suplier }}').value;
                        var errorMessage = document.getElementById('nomor_telepon_error{{ $suplierItem->id_suplier }}');
                
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

                    document.getElementById('nomor_telepon{{ $suplierItem->id_suplier }}').addEventListener('input', function(e) {
                        if (this.value.length > 13) {
                            this.value = this.value.slice(0, 13); 
                        }
                    });


                </script>
            </div>
        </div>
    </div>
</div>
@endforeach
