<!-- Modal Edit Obat -->
@foreach ($obats as $obat)
<div class="modal fade" id="editObatModal{{ $obat->id_obat }}" tabindex="-1" role="dialog" aria-labelledby="editObatModalLabel{{ $obat->id_obat }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editObatModalLabel{{ $obat->id_obat }}">Edit Obat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('obat.update', $obat->id_obat) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Suplier</label>
                        <input type="text" name="kode_suplier" class="form-control" value="{{ $obat->kode_suplier }}" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Obat</label>
                        <input type="text" name="kode_obat" class="form-control" value="{{ $obat->kode_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" value="{{ $obat->nama_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Obat</label>
                        <input type="number" name="harga_obat" class="form-control" value="{{ $obat->harga_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Obat</label>
                        <input type="number" name="jumlah_obat" class="form-control" value="{{ $obat->jumlah_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" name="Satuan" class="form-control" value="{{ $obat->Satuan }}" required>
                    </div>
                    <div class="form-group">
                        <label>Total Harga Obat</label>
                        <input type="number" name="total_harga_obat" class="form-control" value="{{ $obat->total_harga_obat }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
