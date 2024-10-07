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
            <form method="POST" action="{{route('kategori.store')}}">
                @csrf
                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input class="form-control" type="text" name="nama_kategori" value="{{old('nama_kategori')}}">
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <input class="form-control" type="text" name="deskripsi" value="{{old('deskripsi')}}">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{route('kategori.index')}}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection