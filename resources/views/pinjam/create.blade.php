@extends('layout.app')
@section('title'){{ 'Tambah Peminjaman' }} @endsection
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
                <form method="POST" action="{{ route('pinjam.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Tanggal Pinjam</label>
                        <input class="form-control" type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Maks Pinjam</label>
                        <input class="form-control" type="date" name="tanggal_maks_pinjam" value="{{ old('tanggal_maks_pinjam') }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Kembali</label>
                        <input class="form-control" type="date" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
                    </div>
                    <div class="mb-3">
                        <label>Nama Petugas</label>
                        <select class="form-control" name="id_user">
                            <option value="">Pilih Petugas</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_user }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Nama Anggota</label>
                        <select class="form-control" name="id_anggota">
                            <option value="">Pilih Nama Anggota</option>
                            @foreach ($anggota as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_anggota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Buku</label>
                        <select class="form-control" name="id_buku">
                            <option value="">Pilih Buku</option>
                            @foreach ($buku as $item)
                                <option value="{{ $item->id }}">{{ $item->judul }}</option>
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
