<div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('jadwal.store') }}">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="namaPasien">Pasien</label>
                        <select name="id_pasien" class="form-control" id="namaPasien">
                            @foreach($pasiens as $p)
                                <option value="{{$p->id_pasien}}">{{$p->nama_pasien}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="id_dokter">Dokter:</label>
                        <select name="id_dokter" class="form-control" id="id_dokter">
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}">{{ $dokter->nama }} - {{ $dokter->jenis }} > {{ $dokter->spesialis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <div>
                        <label for="jam">Jam:</label>
                        <input type="time" class="form-control" name="waktu" id="waktu">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
