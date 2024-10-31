@extends('layout.app')
<title>Edit Buku</title>
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
                <form method="POST" action="{{ route('buku.update', $buku->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label>Kode Buku</label>
                        <input class="form-control" type="number" name="kode_buku"
                            value="{{ old('kode_buku', $buku->kode_buku) }}">
                    </div>
                    <div class="mb-3">
                        <label>Judul</label>
                        <input class="form-control" type="text" name="judul" value="{{ old('judul', $buku->judul) }}">
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <input class="form-
                        control" type="text" name="kategori"
                            value="{{ old('kategori', $buku->kategori) }}">
                    </div>
                    <div class="mb-3">
                        <label>Pengarang</label>
                        <input class="form-control" type="text" name="pengarang"
                            value="{{ old('pengarang', $buku->pengarang) }}">
                    </div>
                    <div class="mb-3">
                        <label>Penerbit</label>
                        <input class="form-control" type="text" name="penerbit"
                            value="{{ old('penerbit', $buku->penerbit) }}">
                    </div>
                    <div class="mb-3">
                        <label>Tahun terbit</label>
                        <input class="form-control" type="number" name="tahun_terbit"
                            value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" placeholder="YYYY">
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input class="form-control" type="text" name="stok" value="{{ old('stok', $buku->stok) }}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('penerbit.index') }}">Kembali</a>
                    </div>

                </form>

            </div>

        </div>
    @endsection
