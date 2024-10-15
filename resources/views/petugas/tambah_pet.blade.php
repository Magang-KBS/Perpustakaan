@extends('layout.app')
@section('title'){{'Tambah Petugas'}} @endsection
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
            <form method="POST" action="{{route('petugas.store')}}">
                @csrf
                <div class="mb-3">
                    <label>Nama Petugas</label>
                    <input class="form-control" type="text" name="nama_petugas" value="{{old('nama_petugas')}}">
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" value="{{old('username')}}">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <div class="input-group">
                    <input class="form-control" type="password" name="password" value="{{old('password')}}">
                    <div class="input-group-append">
                    <span class="eye-icon" id="togglePassword" onclick="togglePassword()">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </span>
                    </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Email Petugas</label>
                    <input class="form-control" type="email" name="email_petugas" value="{{old('email_petugas')}}">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{route('petugas.index')}}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection