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
            <form method="POST" action="{{route('denda.update',$denda->id)}}">
            @csrf
            @method('PUT')
                <div>
                    <label for="id_pinjam">ID Pinjam</label>
                    <input class="form-control" type="number" name="id_pinjam" id="id_pinjam" value="{{ $denda->id_pinjam }}" required>
                </div>
                <div>
                    <label for="id_anggota">ID Anggota</label>
                    <input class="form-control" type="number" name="id_anggota" id="id_anggota" value="{{ $denda->id_anggota }}" required>
                </div>
                <div>
                    <label for="jumlah_denda">Jumlah Denda (Rp)</label>
                    <input class="form-control" type="number" name="jumlah_denda" id="jumlah_denda" step="0.01" value="{{ $denda->jumlah_denda }}" required>
                </div>
                <div>
                    <label for="notes">Notes</label>
                    <textarea class="form-control" name="notes" id="notes">{{ $denda->notes }}</textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{route('denda.index')}}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
