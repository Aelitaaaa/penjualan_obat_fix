<div class="modal fade" id="editObatModal{{ $obatItem->id_obat }}" tabindex="-1" role="dialog" aria-labelledby="editObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editObatModalLabel">Edit Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('obat.update', ['id' => $obatItem->id_obat]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_suplier">Suplier</label>
                        <select name="kode_suplier" class="form-control" required>
                            @foreach($suplier as $item)
                                <option value="{{ $item->kode_suplier }}" {{ $item->kode_suplier == $obatItem->kode_suplier ? 'selected' : '' }}>
                                    {{ $item->nama_suplier }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_obat">Kode Obat</label>
                        <input type="text" name="kode_obat" class="form-control" value="{{ $obatItem->kode_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" value="{{ $obatItem->nama_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_obat">Harga</label>
                        <input type="number" name="harga_obat" class="form-control" value="{{ $obatItem->harga_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_obat">Jumlah</label>
                        <input type="number" name="jumlah_obat" class="form-control" value="{{ $obatItem->jumlah_obat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" class="form-control" value="{{ $obatItem->unit }}" required>
                    </div>
                    <div class="form-group">
                        <label for="total_harga_obat">Total Harga</label>
                        <input type="number" name="total_harga_obat" class="form-control" value="{{ $obatItem->total_harga_obat }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>