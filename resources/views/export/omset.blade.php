<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Kode Pembelian</th>
            <th>Kode Pembelian</th>
            <th>Total Pembelian</th>
        </tr>
        <tbody>
            @foreach($data as $index => $pembelian)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembelian->created_at }}</td>
                    <td>{{ $pembelian->kode_pembelian }}</td>
                    <td>{{ $pembelian->kode_pembelian }}</td> <!-- Mungkin kolom ini seharusnya berbeda -->
                    <td>{{ number_format($pembelian->total_pembelian, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
</table>