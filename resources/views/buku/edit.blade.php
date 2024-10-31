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
                <form method="POST" action="{{ route('buku.update', $buku->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label>Kode Buku</label>
                        <input class="form-control" type="text" name="kode_buku"
                            value="{{ old('kode_buku', $buku->kode_buku) }}">
                    </div>
                    <div class="mb-3">
                        <label>Judul</label>
                        <input class="form-control" type="text" name="judul"
                            value="{{ old('judul', $buku->judul) }}">
                    </div>
                    <div class="mb-3">
                        <label>Tahun Terbit</label>
                        <input class="form-control" type="number" name="tahun_terbit" min="1" max="2024"
                            value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" placeholder="YYYY">
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select class="form-control" name="id_kategori">
                            <option value="">Pilih Kategori Buku</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $buku->id_kategori ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Pengarang</label>
                        <select class="form-control" name="id_pengarang">
                            <option value="">Pilih Pengarang Buku</option>
                            @foreach ($pengarang as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $buku->id_pengarang ? 'selected' : '' }}>
                                    {{ $item->nama_pengarang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Sampul Buku</label>
                        <input class="form-control" type="file" name="sampul_buku">
                        <img src="/sampuls/{{ $buku->sampul_buku }}" width="100" alt="Sampul Buku">
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input class="form-control" type="number" name="stok"
                            value="{{ old('stok', $buku->stok) }}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('buku.index') }}">Kembali</a>
                    </div>

                </form>

            </div>

        </div>
    @endsection
