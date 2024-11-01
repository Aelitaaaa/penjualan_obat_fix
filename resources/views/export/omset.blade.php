<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th colspan="4" class="text-center ">
                <h4 class="mb-3">Dari Tanggal {{ $start->format('d-m-Y') }} Sampai Tanggal {{ $end->format('d-m-Y') }}</h4>
            </th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Kode Resep</th>
            <th>Total Penjualan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $penjualan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $penjualan->created_at }}</td>
                <td>{{ $penjualan->kode_resep}}</td>
                <td>{{ $penjualan->total }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th class="text-center" colspan="3">Modal</th>
            <th>{{ $total_omset }}</th>
        </tr>
    </tfoot>
</table>