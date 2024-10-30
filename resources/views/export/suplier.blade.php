
    <div class="title">Laporan Data Supplier</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Penambahan</th>
                <th>Terakhir Diperbarui</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supliers as $index => $suplier)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $suplier->kode_suplier }}</td>
                    <td>{{ $suplier->nama_suplier }}</td>
                    <td>{{ $suplier->alamat }}</td>
                    <td>{{ $suplier->nomor_telepon }}</td>
                    <td>{{ $suplier->created_at }}</td>
                    <td>{{ $suplier->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ date('Y-m-d H:i:s') }}
    </div>
</body>
</html>
