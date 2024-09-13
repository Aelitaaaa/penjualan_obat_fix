<div class="modal" id="detailObatModal{{ $obatItem->id_obat }}" tabindex="-1" role="" aria-labelledby="detailObatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"> Detail Obat </h6>
                </div>
              
                <div class="card-body">
                    
                        <div class="mb-4 ml-5">
                            <h5>Kode Obat : </h5> <h6> {{$obatItem->kode_obat}}</h6>
                        </div>
                        <div class="mb-4 ml-5">
                            <h5>Nama Obat </h5> <h6>{{$obatItem->nama_obat}}</h6>
                        </div>
                        <div class="mb-4 ml-5">
                            <h5>Asal Supply </h5> <h6>{{$obatItem->kode_suplier}} - {{ $obatItem->suplier ? $obatItem->suplier->nama_suplier : '' }}</h6>
                        </div>
                    
                    
                        <div class="mb-4 ml-5">
                            <h5>Harga Jual </h5> <h6>Rp.{{ number_format($obatItem->harga_jual, 0, ',', '.') }}</h6>
                        </div>
                        <div class="mb-4 ml-5">
                            <h5>Harga Beli </h5> <h6>Rp.{{ number_format($obatItem->harga_beli, 0, ',', '.') }}</h6>
                        </div>
                        <div class="mb-4 ml-5">
                            <h5>Stok Obat </h5> <h6>{{$obatItem->jumlah_obat}} - {{$obatItem->unit}}</h6>
                        </div>   
                    
                </div>
            </div>
           
        </div>
    </div>
</div>