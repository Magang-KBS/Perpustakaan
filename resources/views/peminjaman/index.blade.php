@extends('layout.app')
<title>Perpustakaan Peminjaman</title>
@section('content')
    @if (session()->has('message'))
        <p class="alert alert-info">{{ session('message') }}</p>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
                <div class="col">
                    <input class="form-control" name="q" value="{{ $q }}" placeholder="Cari...">
                </div>
                <div class="col">
                    <button class="btn btn-success">Refresh</button>
                </div>

                <div class="col">
                    <a class="btn btn-primary" href="{{ route('peminjaman.create') }}">Tambah</a>
                </div>

            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Tanggal Maksimal Pinjaman</th>
                        <th>Tanggal Kembali</th>
                        <th>Id Petugas</th>
                        <th>Id Anggota</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <?php //$no = 1;
                ?>
                @foreach ($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $peminjaman->tgl_pinjam }}</td>
                        <td>{{ $peminjaman->tgl_max_pinjam }}</td>
                        <td>{{ $peminjaman->tgl_kembali }}</td>
                        <td>{{ $peminjaman->id_anggota }}</td>
                        <td>{{ $peminjaman->id_petugas }}</td>
                        <td>{{ $peminjaman->status }}</td>

                        <td>

                            <a class="btn btn-sm btn-warning"
                                href="{{ route('peminjaman.edit', $peminjaman->id) }}">Ubah</a>

                            <form method="POST" class="d-inline" action="{{ route('peminjaman.destroy', $peminjaman) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>



                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
        @if ($peminjamans->hasPages())
            <div class="card-footer">
                {{ $peminjamans->links() }}
            </div>
        @endif
    </div>
@endsection
