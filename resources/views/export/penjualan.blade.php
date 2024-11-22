<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle">Kode Resep</th>
            <th class="text-center align-middle">Kode Obat</th>
            <th class="text-center align-middle">Nama Obat</th>
            <th class="text-center align-middle">Jumlah Obat</th>
            <th class="text-center align-middle">Harga satuan</th>
            <th class="text-center align-middle">Total Penjualan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detailResep as $key => $item)
            <tr>
                <td class="text-center align-middle">{{ $key + 1 }}</td>
                <td class="text-center align-middle">{{ $item->kode_resep }}</td>              
                <td class="text-center align-middle">{{ $item->obat->kode_obat }}</td>
                <td class="text-center align-middle">{{ $item->obat->nama_obat }}</td>
                <td class="text-center align-middle">{{ $item->jumlah_obat }}</td>
                <td class="text-center align-middle">{{ $item->harga_satuan }}</td>
                <td class="text-center align-middle">{{ $item->total }}</td>
            
            </tr>
        @endforeach
    </tbody>
</table>