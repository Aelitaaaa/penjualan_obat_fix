<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembelian</title>
    @include('template.head')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('template.navbar')
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Tambah Pembelian</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('pembelian.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Kode Pembelian</label>
                                    <input type="text" name="kode_pembelian" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kode Obat</label>
                                    <input type="text" name="kode_obat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Kode Suplier</label>
                                    <input type="text" name="kode_suplier" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Harga Obat</label>
                                    <input type="number" name="harga_obat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Pembelian</label>
                                    <input type="number" name="jumlah_pembelian" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Total Harga</label>
                                    <input type="number" name="total_harga" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembelian</label>
                                    <input type="date" name="tanggal_pembelian" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template.script')
</body>
</html>
