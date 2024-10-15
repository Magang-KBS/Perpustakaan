@extends('layout.app')
<title>Edit Peminjaman</title>
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-info">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label>Tanggal Peminjaman</label>
                        <input class="form-control" type="date" name="tgl_pinjam"
                            value="{{ old('tgl_pinjam', $peminjaman->tgl_pinjam) }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Maksimal Peminjaman</label>
                        <input class="form-control" type="date" name="tgl_max_pinjam"
                            value="{{ old('tgl_max_pinjam', $peminjaman->tgl_max_pinjam) }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Kembali</label>
                        <input class="form-
                        control" type="date" name="tgl_kembali"
                            value="{{ old('tgl_kembali', $peminjaman->tgl_kembali) }}">
                    </div>
                    <div class="mb-3">
                        <label>Id Anggota</label>
                        <input class="form-control" type="number" name="id_anggota"
                            value="{{ old('id_anggota', $peminjaman->id_anggota) }}">
                    </div>
                    <div class="mb-3">
                        <label>Id Petugas</label>
                        <input class="form-control" type="number" name="id_petugas"
                            value="{{ old('id_petugas', $peminjaman->id_petugas) }}">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input class="form-control" type="text" name="status"
                            value="{{ old('status', $peminjaman->status) }}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('penerbit.index') }}">Kembali</a>
                    </div>

                </form>

            </div>

        </div>
    @endsection
