@foreach ($obat as $obatItem)
<div class="modal fade" id="deleteObatModal{{ $obatItem->id_obat }}" tabindex="-1" role="dialog" aria-labelledby="deleteObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteObatModalLabel">Konfirmasi Pemindahan Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Pindahkan data obat ini ke Trash?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route('obat.destroy', $obatItem->id_obat) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Pindahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
