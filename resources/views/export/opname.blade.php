<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th class="text-center align-middle">No</th>
        <th class="text-center align-middle">Tanggal Opname</th>
        <th class="text-center align-middle">Nama Obat</th>
        <th class="text-center align-middle">Jumlah Sistem</th>
        <th class="text-center align-middle">Jumlah Fisik</th>
        <th class="text-center align-middle">Minus</th>
        <th class="text-center align-middle">Harga</th>
        <th class="text-center align-middle">Kerugian</th>
        <th class="text-center align-middle">Terakhir Diperbarui</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($stockOpname as $index => $stockOpnames)
        <tr>
          <td class="text-center" style="vertical-align: middle;">{{ $index + 1 }}</td>
          <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->created_at }}</td>
         <td class="text-center" style="vertical-align: middle;">
          {{ $stockOpnames->kode_obat }} - 
          @if($stockOpnames->obat)
              {{ $stockOpnames->obat->nama_obat }}
          @else
              <span class="text-danger">Obat tidak ditemukan</span>
          @endif </td>
          <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->jumlah_sistem }}</td>
          <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->jumlah_fisik }}</td>
          <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->minus }}</td>
          <td class="text-center" style="vertical-align: middle;">Rp. {{ number_format($stockOpnames->harga_obat, 0, ',', '.') }}</td>
          <td class="text-center" style="vertical-align: middle;">Rp. {{ number_format($stockOpnames->total_kerugian, 0, ',', '.') }}</td>
          <td class="text-center" style="vertical-align: middle;">{{ $stockOpnames->updated_at }}</td>
        </tr>  
      
      @endforeach
    </tbody>
  </table>