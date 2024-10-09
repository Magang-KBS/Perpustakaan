@extends('layout.app')
<title>Perpustakaan Anggota</title>

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
                    <a class="btn btn-primary" href="{{ route('anggota.create') }}">Tambah</a>
                </div>

            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Anggota</th>
                        <th>No Telepon</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <?php //$no = 1;
                ?>
                @foreach ($anggotas as $anggota)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $anggota->nama_anggota }}</td>
                        <td>{{ $anggota->no_telepon }}</td>
                        <td>{{ $anggota->nim }}</td>
                        <td>{{ $anggota->email }}</td>
                        <td>

                            <a class="btn btn-sm btn-warning" href="{{ route('anggota.edit', $anggota->id) }}">Ubah</a>

                            <form method="POST" class="d-inline" action="{{ route('anggota.destroy', $anggota) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>



                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
        @if ($anggotas->hasPages())
            <div class="card-footer">
                {{ $anggotas->links() }}
            </div>
        @endif
    </div>
@endsection
