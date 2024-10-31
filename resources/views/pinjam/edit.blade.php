@extends('layout.app')
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
                <form method="POST" action="{{ route('pinjam.update', $pinjam->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label>Tanggal Pinjam</label>
                        <input class="form-control" type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $pinjam->tanggal_pinjam) }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Maks Pinjam</label>
                        <input class="form-control" type="date" name="tanggal_maks_pinjam" value="{{ old('tanggal_maks_pinjam', $pinjam->tanggal_maks_kembali) }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Kembali</label>
                        <input class="form-control" type="date" name="tanggal_kembali" value="{{ old('tanggal_kembali', $pinjam->tanggal_kembali) }}">
                    </div>
                    <div class="mb-3">
                        <label>ID Petugas</label>
                        <input class="form-control" type="text" name="id_petugas" value="{{ old('id_petugas', $pinjam->id_petugas) }}">
                    </div>
                    <div class="mb-3">
                        <label>ID Anggota</label>
                        <input class="form-control" type="text" name="id_anggota" value="{{ old('id_anggota', $pinjam->id_anggota) }}">
                    </div>
                    <div class="mb-3">
                        <label>Buku</label>
                        <select class="form-control" name="id_buku">
                            <option value="">Pilih Buku</option>
                            @foreach ($buku as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $pinjam->id_buku ? 'selected' : '' }}>
                                    {{ $item->judul }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('pinjam.index') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
