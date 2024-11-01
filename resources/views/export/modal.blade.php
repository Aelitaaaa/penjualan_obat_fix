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
            <th>Kode Pembelian</th>
            <th>Total Pembelian</th>
        </tr>
        <tbody>
            @foreach($data as $index => $pembelian)
                <tr>

                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembelian->created_at }}</td>
                    <td>{{ $pembelian->kode_pembelian }}</td>
                    <td>{{ $pembelian->total_pembelian }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center" colspan="3">Modal</th>
                <th>{{ $total_modal }}</th>
            </tr>
        </tfoot>
</table>