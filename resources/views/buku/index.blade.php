@extends('layout.app')
<title>Perpustakaan Buku</title>
@section('content')
    @if (session()->has('message'))
        <p class="alert alert-info">{{ session('message') }}</p>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
                <div class="col">
                    <input class="form-control" name="q" value="{{ $searchQuery }}" placeholder="Cari...">
                </div>
                <div class="col">
                    <button class="btn btn-success">Refresh</button>
                </div>

                <div class="col">
                    <a class="btn btn-primary" href="{{ route('buku.create') }}">Tambah</a>
                </div>

            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode buku</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun terbit</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $no = 1;
                ?>
                @foreach ($bukus as $buku)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $buku->kode_buku }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->kategori }}</td>
                        <td>{{ $buku->pengarang }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ $buku->tahun_terbit }}</td>
                        <td>{{ $buku->stok }}</td>

                        <td>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengarang ini?')">Hapus</button>
                            </form>
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
        @if ($bukus->hasPages())
            <div class="card-footer">
                {{ $bukus->links() }}
            </div>
        @endif
    </div>
@endsection
