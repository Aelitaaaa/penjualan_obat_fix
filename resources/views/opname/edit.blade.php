@foreach($stockOpname as $opnameItem)
<div class="modal fade" id="editOpnameModal{{ $opnameItem->id_opname }}" tabindex="-1" role="dialog" aria-labelledby="editOpnameModalLabel{{ $opnameItem->id_opname }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOpnameModalLabel{{ $opnameItem->id_opname }}">Edit Opname</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('opname.update', $opnameItem->id_opname ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="kode_obat">Obat</label>
                        <select name="kode_obat" class="form-control" required>
                            @foreach ($obat as $item)
                                <option value="{{ $item->kode_obat }}" {{ $item->kode_obat == $opnameItem->kode_obat ? 'selected' : '' }}>
                                    {{ $item->kode_obat }} - {{ $item->nama_obat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="jumlah_sistem">Jumlah Sistem</label>
                        <input type="number" id="jumlah_sistem{{ $opnameItem->id_opname }}" name="jumlah_sistem" class="form-control" value="{{ $opnameItem->jumlah_sistem }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_fisik">Jumlah Fisik</label>
                        <input type="number" id="jumlah_fisik{{ $opnameItem->id_opname }}" name="jumlah_fisik" class="form-control" value="{{ $opnameItem->jumlah_fisik }}" required>
                    </div>

                    <div class="form-group">
                        <label for="minus">Minus</label>
                        <input type="number" id="minus{{ $opnameItem->id_opname }}" name="minus" class="form-control" value="{{ $opnameItem->minus }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="harga_obat">Harga Obat</label>
                        <input type="number" id="harga_obat{{ $opnameItem->id_opname }}" name="harga_obat" class="form-control" value="{{ $opnameItem->harga_obat }}" required>
                    </div>

                    <div class="form-group">
                        <label for="total_kerugian">Total Kerugian</label>
                        <input type="number" id="total_kerugian{{ $opnameItem->id_opname }}" name="total_kerugian" class="form-control" value="{{ $opnameItem->total_kerugian }}" readonly>
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

