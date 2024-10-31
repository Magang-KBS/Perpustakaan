@extends('layout.app')
<title>Perpustakaan Penerbit</title>
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
                    <a class="btn btn-primary" href="{{ route('penerbit.create') }}">Tambah</a>
                </div>

            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Penerbit</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <?php //$no = 1;
                ?>
                @foreach ($penerbits as $penerbit)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $penerbit->nama_penerbit }}</td>
                        <td>{{ $penerbit->no_telp }}</td>
                        <td>{{ $penerbit->alamat }}</td>
                        <td>

                            <a class="btn btn-sm btn-warning" href="{{ route('penerbit.edit', $penerbit->id) }}">Ubah</a>

                            <form method="POST" class="d-inline" action="{{ route('penerbit.destroy', $penerbit) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
        @if ($penerbits->hasPages())
            <div class="card-footer">
                {{ $penerbits->links() }}
            </div>
        @endif
    </div>
@endsection
