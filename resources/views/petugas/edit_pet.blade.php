@extends('layout.app')
@section('title'){{'Edit Petugas'}} @endsection
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
            <form method="POST" action="{{route('petugas.update',$petugas->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label>Nama Petugas</label>
                <input class="form-control" type="text" name="nama_petugas" value="{{old('nama_petugas',$petugas->nama_petugas)}}">
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input class="form-control" type="text" name="username" value="{{old('deskripsi',$petugas->username)}}">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input class="form-control" type="email" name="email_petugas" value="{{old('email_Petugas',$petugas->email_petugas)}}">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{route('petugas.index')}}">Kembali</a>
            </div>
            
            </form>

        </div>

    </div>
@endsection