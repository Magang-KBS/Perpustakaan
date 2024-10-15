@extends('layout.app')
@section('title'){{'Tambah Pengarang'}} @endsection
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
            <form method="POST" action="{{route('pengarang.store')}}">
            @csrf
            <div class="mb-3">
                <label>Nama Pengarang</label>
                <input class="form-control" type="text" name="nama_pengarang" value="{{old('nama_pengarang')}}">
            </div>
            <div class="mb-3">
                <label>Nomor Telepon</label>
                <input class="form-control" type="number" name="no_telepon" value="{{old('no_telepon')}}">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input class="form-control" type="email" name="email" value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{route('pengarang.index')}}">Kembali</a>
            </div>
            
            </form>
        </div>
    </div>
@endsection

