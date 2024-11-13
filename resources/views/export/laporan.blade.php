<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th colspan="7" class="text-center ">
                <h4 class="mb-3">Dari Tanggal {{ $start->format('d-m-Y') }} Sampai Tanggal {{ $end->format('d-m-Y') }}</h4>
            </th>
        </tr>
        <tr>
            <th>No Laporan</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Biaya Obat</th>
            <th>Biaya Dokter</th>
            <th>Total Biaya</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->rekamMedis->pasien->nama_pasien}}</td>
            <td>{{$d->rekamMedis->dokter->nama}}</td>
            <td>{{ number_format($d->rekamMedis->resep->detailResep->sum('total'), 0, ',', '.') }}</td>
            <td>{{ number_format($d->total_biaya - $d->rekamMedis->resep->detailResep->sum('total'), 0, ',', '.') }}</td>
            <td>{{ number_format($d->total_biaya, 0, ',', '.') }}</td>
            <td>{{ $d->created_at->format('Y-m-d') }}</td>

        </tr>
        @endforeach
    </tbody>
</table>