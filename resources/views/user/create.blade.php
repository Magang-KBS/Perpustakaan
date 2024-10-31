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
            <form method="POST" action="{{route('user.store')}}">
            @csrf
            <div class="mb-3">
                <label>Nama User</label>
                <input class="form-control" type="text" name="name" value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input class="form-control" type="password" name="password" value="{{old('password')}}">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input class="form-control" type="email" name="email" value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{route('user.index')}}">Kembali</a>
            </div>
            
            </form>
        </div>
    </div>
@endsection

