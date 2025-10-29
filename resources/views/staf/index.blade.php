<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Staf Apotek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Staf Apotek</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('staf.create') }}" class="btn btn-md btn-success mb-3">TAMBAH STAF</a>
                        <a href="{{ route('staf.export_excel') }}" class="btn btn-md btn-info mb-3">EXPORT EXCEL</a>
                        <a href="{{ route('staf.show_import_form') }}" class="btn btn-md btn-warning mb-3">IMPORT EXCEL</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">TTL</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col">NO. HP</th>
                                    <th scope="col" style="width: 20%">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stafs as $staf)
                                <tr>
                                    <td>{{ $staf->nama }}</td>
                                    <td>{{ $staf->tempat_lahir }}, {{ \Carbon\Carbon::parse($staf->tanggal_lahir)->format('d-m-Y') }}</td>
                                    <td>{{ $staf->alamat }}</td>
                                    <td>{{ $staf->no_hp }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('staf.destroy', $staf->id) }}" method="POST">
                                            <a href="{{ route('staf.edit', $staf->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Staf Apotek belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $stafs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Pesan dengan sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>