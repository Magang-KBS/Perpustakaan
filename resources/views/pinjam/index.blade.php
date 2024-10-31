@extends('layout.app')
@section('title'){{'Peminjaman'}} @endsection

@section('content')
@if (session()->has('message'))
    <p class="alert alert-info">{{ session('message') }}</p>
@endif

<div class="card mb-3">
    <div class="card-header">
        <form class="row row-cols-auto g-1">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('pinjam.create') }}">Tambah</a>
            </div>
            <div>
                <button onclick="location.reload();" class="btn btn-success">Refresh</button>
            </div>
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped m-0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Maks Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Nama Petugas</th>
                    <th>Buku</th>
                    <th>Anggota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($pinjams as $pinjam)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                    <td>{{ $pinjam->tanggal_maks_kembali }}</td>
                    <td>{{ $pinjam->tanggal_kembali }}</td>
                    <td>{{ $pinjam->id_petugas }}</td>
                    <td>{{ $pinjam->buku->judul ?? 'N/A' }}</td> 
                    <td>{{ $pinjam->anggota->nama ?? 'N/A' }}</td>
                    <td> 
                        <a href="{{ route('pinjam.edit', $pinjam->id_pinjam) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('pinjam.destroy', $pinjam->id_pinjam) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data pinjam ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pinjams->links() }}
    </div>
</div>

@endsection
