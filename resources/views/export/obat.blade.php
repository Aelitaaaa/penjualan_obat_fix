
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Supplier</th>
            <th>Kode Obat</th>
            <th>Obat</th>
            <th>Stok</th>
            <th>Unit</th>
            <th>Tanggal</th>
            <th>Terakhir Diperbarui</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($obat as $key => $obatItem)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $obatItem->suplier ? $obatItem->suplier->nama_suplier : '' }}</td>
                <td>{{ $obatItem->kode_obat }} </td>
                <td>{{ $obatItem->nama_obat }}</td>
                <td>{{ $obatItem->jumlah_obat }}</td>
                <td>{{ $obatItem->unit }}</td>
                <td >{{ $obatItem->created_at }}</td>
                <td >{{ $obatItem->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>