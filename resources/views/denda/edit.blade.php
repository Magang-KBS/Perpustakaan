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
                    <div class="mb-3">
                        <label>Nama Anggota</label>
                        <select class="form-control" name="id_anggota">
                            <option value="">Pilih Nama Anggota</option>
                            @foreach ($anggota as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $buku->nama_anggota ? 'selected' : '' }}>
                                    {{ $item->nama_anggota }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                <div>
                    <label for="jumlah_denda">Jumlah Denda (Rp)</label>
                    <input class="form-control" type="text" name="jumlah_denda" id="jumlah_denda" value="{{ $denda->jumlah_denda }}" required placeholder="Masukkan jumlah dalam ribuan">>
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
            <script>
                const jumlahInput = document.getElementById('jumlah_denda');

                jumlahInput.addEventListener('input', function (e) {
                    let value = e.target.value.replace(/[^,\d]/g, ''); 
                    
                    if (value) {
                        value = parseInt(value, 10).toLocaleString('id-ID');
                    }

                    e.target.value = value ? `Rp ${value}` : '';
                });
            </script>
        </div>
    </div>
@endsection
