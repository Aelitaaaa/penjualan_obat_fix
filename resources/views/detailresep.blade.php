<div class="modal" id="detailResepModal{{ $re->kode_resep }}" tabindex="-1" role="dialog" aria-labelledby="detailResepModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
         
                <div class="modal-header">
                  <h6 class="modal-title"> Detail Resep </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
                <div class="card-body-detail text-l">
                   
                        <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Kode Resep : <p> {{$re->kode_resep}} </p></div> 
                            
                        </div>
                        <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Nama Obat </div>
                            {{$re->nama_obat}}
                        </div>
                    
                        <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Nama Resep </div>
                            {{$re->nama_resep}}
                         </div>
                         <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">ID Rekammedis </div>
                            {{$re->rekamMedis->id}}
                         </div>

                         <div class="mb-4 .col-md-6 .ml-auto text-left">
                            <div class="text-gray-800">Dokter </div>
                            {{$re->rekamMedis->dokter->nama}}
                         </div>
                    
    
                       
                </div>
            </div>
           
        </div>
    </div>
</div>