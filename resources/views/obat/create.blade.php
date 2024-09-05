<!-- Modal Tambah Obat -->
<div class="modal fade text-left" id="tambahObatModal" tabindex="-1" role="dialog" aria-labelledby="tambahObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('obat.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahObatModalLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Suplier</label>
                        <select name="kode_suplier" class="form-control">
                            <option value="">-Pilih-</option>
                            @foreach ($suplier as $suplierItem)
                                <option value="{{ $suplierItem->kode_suplier }}">{{ $suplierItem->kode_suplier }} - {{ $suplierItem->nama_suplier }}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label>Kode Obat</label>
                        <input type="text" id="kode_obat" name="kode_obat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" id="nama_obat" name="nama_obat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" id="harga_beli" name="harga_beli" class="form-control" placeholder="Rp." required>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" id="harga_jual" name="harga_jual" class="form-control" placeholder="Rp." required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" id="jumlah_obat" name="jumlah_obat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <input type="text" id="unit" name="unit" class="form-control" required>
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
