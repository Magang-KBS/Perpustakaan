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
            <form method="POST" action="{{route('pengarang.update',$pengarang->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label>Nama Pengarang</label>
                <input class="form-control" type="text" name="nama_pengarang" value="{{old('nama_pengarang',$pengarang->nama_pengarang)}}">
            </div>     
            </form>

        </div>

    </div>
@endsection