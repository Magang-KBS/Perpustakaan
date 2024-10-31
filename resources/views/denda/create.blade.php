@extends('layout.app')
@section('title'){{'Tambah Denda'}} @endsection
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
            <form method="POST" action="{{ route('denda.store') }}">
                @csrf
                <div class="mb-3">
                    <label>Nama Anggota</label>
                        <select class="form-control" name="id_anggota" id="id_anggota" required>
                            <option value="">Pilih Nama Anggota</option>
                                @foreach ($anggota as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_anggota }}</option>
                                @endforeach
                        </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_denda">Jumlah Denda:</label>
                    <input class="form-control" type="number" step="0.01" name="jumlah_denda" id="jumlah_denda" required>
                </div>
                <div class="mb-3">
                    <label for="notes">Notes:</label>
                    <textarea class="form-control" name="notes" id="notes"></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{route('denda.index')}}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
