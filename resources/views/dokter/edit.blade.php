   <!-- Modal Edit -->
   <div class="modal fade" id="editDataModal{{$dokter->id}}" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModalLabel">Edit Data Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('dokter.update', $dokter->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editNamaDokter">Nama Dokter</label>
                        <input type="text" class="form-control" value="{{$dokter->nama}}" name="nama" id="editNamaDokter" placeholder="Masukkan Nama Dokter">
                    </div>
                    <div class="form-group">
                        <label for="editSpesialisDokter">Spesialis</label>
                        <input type="text" class="form-control" id="editSpesialisDokter" value="{{$dokter->spesialis}}" name="spesialis" placeholder="Masukkan Spesialis">
                    </div>
                    <div class="form-group">
                        <label for="editTeleponDokter">No. Telepon</label>
                        <input type="text" class="form-control" id="editTeleponDokter" value="{{$dokter->telp}}" name="telp" placeholder="Masukkan No. Telepon">
                    </div>
                    <div class="form-group">
                        <label for="editTarifDokter">Tarif</label>
                        <input type="text" class="form-control" id="editTarifDokter" value="{{$dokter->tarif}}" name="tarif" placeholder="Masukkan Tarif">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Edit Data Modal -->