<div class="modal" id="detailObatModal{{ $obatItem->id_obat }}" tabindex="-1" role="dialog" aria-labelledby="detailObatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
         
                <div class="modal-header">
                  <h6 class="modal-title"> Detail Obat </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
                <div class="card-body-detail text-l">
                   
                        <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Kode Obat : <p> {{$obatItem->kode_obat}} </p></div> 
                            
                        </div>
                        <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Nama Obat </div>
                            {{$obatItem->nama_obat}}
                        </div>
                    
                        <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Asal Supply </div>
                            {{$obatItem->kode_suplier}} - {{ $obatItem->suplier ? $obatItem->suplier->nama_suplier : '' }}
                         </div>
                         <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Stok Obat </div>
                            {{$obatItem->jumlah_obat}} - {{$obatItem->unit}}
                         </div>
                    
    
                        <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Harga Jual </div>
                            Rp. {{ number_format($obatItem->harga_jual, 0, ',', '.') }}
                         </div>

                         <div class=".col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Harga Beli </div>
                            Rp. {{ number_format($obatItem->harga_beli, 0, ',', '.') }}
                         </div>
                   
                </div>
            </div>
           
        </div>
    </div>
</div>