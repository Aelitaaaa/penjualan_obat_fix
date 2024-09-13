<!-- Modal Hapus -->
<div class="modal fade" id="deleteOpnameModal{{ $stockOpnames->id_opname }}" tabindex="-1" role="dialog" aria-labelledby="deleteOpnameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteOpnameModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah kamu yakin ingin menghapus opname ini?
            </div>
            <div class="modal-footer">
                <form action="{{ route('opname.destroy', $stockOpnames->id_opname) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
