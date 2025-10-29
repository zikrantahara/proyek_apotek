<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('obat.store') }}" method="POST">
                        
                            @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">KODE OBAT</label>
                                <input type="text" class="form-control @error('kode_obat') is-invalid @enderror" name="kode_obat" value="{{ old('kode_obat') }}" placeholder="Masukkan Kode Obat">
                                @error('kode_obat')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAMA OBAT</label>
                                <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" name="nama_obat" value="{{ old('nama_obat') }}" placeholder="Masukkan Nama Obat">
                                @error('nama_obat')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">STOCK OBAT</label>
                                        <input type="number" class="form-control @error('stock_obat') is-invalid @enderror" name="stock_obat" value="{{ old('stock_obat') }}" placeholder="0">
                                        @error('stock_obat')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">TANGGAL KADALUARSA</label>
                                        <input type="date" class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}">
                                        @error('tanggal_kadaluarsa')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('obat.index') }}" class="btn btn-md btn-secondary">KEMBALI</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>