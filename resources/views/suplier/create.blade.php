<!-- Modal Tambah Suplier -->

<div class="modal fade text-left" id="tambahSuplierModal" tabindex="-1" role="dialog" aria-labelledby="tambahSuplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('suplier.store') }}">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSuplierModalLabel">Tambah Suplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Suplier</label>
                        <input type="text" name="kode_suplier" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Suplier</label>
                        <input type="text" id="nama_suplier" name="nama_suplier" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" id="nomor_telepon" name="nomor_telepon" class="form-control" required>
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