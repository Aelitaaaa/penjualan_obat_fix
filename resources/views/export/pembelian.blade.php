<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle">Kode Pembelian</th>
            <th class="text-center align-middle">Kode Obat</th>
            <th class="text-center align-middle">Nama Obat</th>
            <th class="text-center align-middle">Jumlah</th>
            <th class="text-center align-middle">Harga Satuan</th>
            <th class="text-center align-middle">Tanggal Pembelian</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($detailPembelian as $key => $item)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td> 
                <td class="text-center">{{ $item->kode_pembelian }}</td>  
                <td class="text-center">{{ $item->obat->kode_obat }}</td>
                <td class="text-center">{{ $item->obat->nama_obat }}</td>
                <td class="text-center">{{ $item->jumlah }}</td>
                <td class="text-center">{{ $item->harga_satuan }}</td>
                <td class="text-center">{{ $item->created_at}}</td>
               
            </tr>
        @endforeach
    </tbody>
                                      
</table>