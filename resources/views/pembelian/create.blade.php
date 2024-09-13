<!-- Modal Tambah Obat -->
<div class="modal fade text-left" id="tambahPembelianModal" tabindex="-1" role="dialog" aria-labelledby="tambahPembelianModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('pembelian.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPembelianModalLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Pembelian</label>
                        <input type="text" name="kode_pembelian" class="form-control" value="{{ $newKodePembelian }}" readonly>
                    </div>                                     
                    <div class="form-group">
                        <label>Kode Suplier</label>
                        <select name="kode_suplier" class="form-control" required>
                            <option value="" disabled selected>Pilih Suplier</option>
                            @foreach($suplier as $item)
                                <option value="{{ $item->kode_suplier }}">{{ $item->kode_suplier }} - {{ $item->nama_suplier }}</option>
                            @endforeach
                        </select>
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
@include('template.script')
