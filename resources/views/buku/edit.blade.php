@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-info">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form method="POST" action="{{route('buku.update',$buku->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label>Judul Buku</label>
                <input class="form-control" type="text" name="judul" value="{{old('judul',$buku->judul)}}">
            </div>
            <div class="mb-3">
                <label>Kode Buku</label>
                <input class="form-control" type="text" name="kode_buku" value="{{old('kode_buku',$buku->kode_buku)}}">
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->nama_kategori }}" {{ old('kategori') == $kategori->nama_kategori ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Pengarang</label>
                <select class="form-control" name="pengarang">
                    <option value="">Pilih Pengarang</option>
                    @foreach($pengarangs as $pengarang)
                        <option value="{{ $pengarang->nama_pengarang }}" {{ old('pengarang') == $pengarang->nama_pengarang ? 'selected' : '' }}>{{ $pengarang->nama_pengarang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Penerbit</label>
                <select class="form-control" name="penerbit">
                    <option value="">Pilih Penerbit</option>
                    @foreach($penerbits as $penerbit)
                        <option value="{{ $penerbit->nama_penerbit }}" {{ old('penerbit') == $penerbit->nama_penerbit ? 'selected' : '' }}>{{ $penerbit->nama_penerbit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input class="form-control" type="number" name="tahun_terbit" value="{{old('tahun_terbit',$buku->tahun_terbit)}}">
            </div>
            <div class="mb-3">
                <label>Stok Buku</label>
                <input class="form-control" type="number" name="stok" value="{{old('stok',$buku->stok)}}">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{route('buku.index')}}">Kembali</a>
            </div>
            
            </form>

        </div>

    </div>
@endsection