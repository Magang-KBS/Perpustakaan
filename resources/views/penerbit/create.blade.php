@extends('layout.app')
<title>Tambah Penerbit</title>
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
                <form method="POST" action="{{ route('penerbit.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Penerbit</label>
                        <input class="form-control" type="text" name="nama_penerbit" value="{{ old('nama_penerbit') }}">
                    </div>
                    <div class="mb-3">
                        <label>Nomor Telepon</label>
                        <input class="form-control" type="number" name="no_telp" value="{{ old('no_telp') }}">
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <input class="form-control" type="text" name="alamat" value="{{ old('alamat') }}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('penerbit.index') }}">Kembali</a>
                    </div>

                </form>

            </div>

        </div>
    @endsection
