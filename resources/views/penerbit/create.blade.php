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
                <form method="POST" action="{{ route('penerbit.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Penerbit</label>
                        <input class="form-control" type="text" name="nama_penerbit" value="{{ old('nama_penerbit') }}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('anggota.index') }}">Kembali</a>
                    </div>

                </form>

            </div>

        </div>
    @endsection
