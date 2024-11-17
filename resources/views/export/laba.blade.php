<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th colspan="7" class="text-center ">
                <h4 class="mb-3">Dari Tanggal {{ $start->format('d-m-Y') }} Sampai Tanggal {{ $end->format('d-m-Y') }}</h4>
            </th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Tanggal Pembelian</th>
            <th>Kode Pembelian</th>
            <th>Total Pembelian</th>
            <th>Tanggal Penjualan</th>
            <th>Kode Resep</th>
            <th>Total Penjualan</th>
        </tr>
    </thead>
    <tbody>
                @foreach($data_pembelian as $index => $pembelian)
            <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembelian->created_at }}</td>
                    <td>{{ $pembelian->kode_pembelian }}</td>
                    <td>{{ $pembelian->total_pembelian }}</td>   
                @endforeach
                @foreach( $data_penjualan as $item )
                    <td>{{ $item->created_at}}</td>
                    <td>{{ $item->kode_resep }}</td>
                    <td>{{$item->total}}</td>
                @endforeach
            </tr>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th class="text-center" colspan="2">HPP:</th>
            <th> {{$modal}}</th>
            <th class="text-center" colspan="2">Omset:</th>
            <th> {{$omset}}</th>
        </tr>
    <tr>
        <th></th>
        <th colspan="7">Laba kotor: {{$laba}}</th>
    </tr>
</tfoot>    
</table>