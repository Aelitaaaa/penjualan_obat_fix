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
                <form action="{{ route('suplier.update', $suplierItem->id_suplier) }}" method="POST">
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
                        <input type="text" name="alamat" class="form-control" value="{{ $suplierItem->alamat }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" class="form-control" value="{{ $suplierItem->nomor_telepon }}" required>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
