<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien - KLIMISTRI</title>
    @include('template.head')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('template.navbar')

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Data Pasien Klinik Klimistri</h1>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPasienModal">
                            <i class="fas fa-fw fa-plus"></i> Tambah Pasien
                        </button>
                    </div>

                    <!-- Modal Tambah Pasien -->
                    @include('pasien.create')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pasien</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Penambahan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pasien as $index => $pasienItem)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pasienItem->nama_pasien }}</td>
                                                <td>{{ $pasienItem->jenis_kelamin }}</td>
                                                <td>{{ $pasienItem->tanggal_lahir }}</td>
                                                <td>{{ $pasienItem->nomor_telepon }}</td>
                                                <td>{{ $pasienItem->alamat }}</td>
                                                <td>{{ $pasienItem->created_at }}</td>
                                                
                                                    <td>
                                                        <button class="btn btn-warning btn-sm" data-toggle="pasien" data-target="#editPasienModal{{ $pasienItem->id_pasien }}">Edit</button>
                                                        @include('pasien.edit')    
                                                        @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                                                        </form>
                                                    </td>
                                                    
                                                    
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @include('template.script')
</body>

</html>
