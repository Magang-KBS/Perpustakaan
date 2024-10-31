@extends('layout.app')
<title>Tambah Buku</title>
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
                <form method="POST" action="{{ route('buku.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Kode Buku</label>
                        <input class="form-control" type="number" name="kode_buku" value="{{ old('kode_buku') }}">
                    </div>
                    <div class="mb-3">
                        <label>Judul </label>
                        <input class="form-control" type="text" name="judul" value="{{ old('judul') }}">
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <input class="form-control" type="text" name="kategori" value="{{ old('kategori') }}">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <select class="form-control" name="pengarang" id="pengarang" required>
                            <option value="">-Pilih Pengarang-</option>
                            @foreach ($pengarangs as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pengarang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <select class="form-control" name="penerbit" id="penerbit" required>
                            <option value="">-Pilih Penerbit-</option>
                            @foreach ($penerbits as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Tahun terbit</label>
                        <input class="form-control" type="number" name="tahun_terbit" min="1" max="2024"
                            value="{{ old('tahun_terbit') }}" placeholder="YYYY">
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input class="form-control" type="text" name="stok" value="{{ old('stok') }}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('buku.index') }}">Kembali</a>
                    </div>

                </form>

            </div>

        </div>
    @endsection
