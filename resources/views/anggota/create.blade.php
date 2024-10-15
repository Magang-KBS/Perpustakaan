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
                <form method="POST" action="{{ route('anggota.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Anggota</label>
                        <input class="form-control" type="text" name="nama_anggota" value="{{ old('nama_anggota') }}">
                    </div>
                    <div class="mb-3">
                        <label>Nomor Telepon</label>
                        <input class="form-control" type="number" name="no_telepon" value="{{ old('no_telepon') }}">
                    </div>
                    <div class="mb-3">
                        <label>NIM</label>
                        <input class="form-control"placeholder="Dosen bisa dikosongkan.." type="number" name="nim"
                            value="{{ old('nim') }}">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('anggota.index') }}">Kembali</a>
                    </div>

                </form>

            </div>

        </div>
    @endsection
