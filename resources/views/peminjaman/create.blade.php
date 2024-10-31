@extends('layout.app')
<title>Tambah Peminjaman</title>
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
                <form method="POST" action="{{ route('peminjaman.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Tanggal Pinjaman</label>
                        <input class="form-control" type="date" name="tgl_pinjam" value="{{ old('tgl_pinjam') }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Maksimal Pinjaman </label>
                        <input class="form-control" type="date" name="tgl_max_pinjam"
                            value="{{ old('tgl_max_pinjaman') }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Kembali</label>
                        <input class="form-control" type="date" name="tgl_kembali" value="{{ old('tgl_kembali') }}">
                    </div>
                    <div class="mb-3">
                        <label for="id_anggota">Id Anggota</label>
                        <select class="form-control" name="id_anggota" id="id_anggota" required>
                            <option value="">-Pilih Anggota-</option>
                            @foreach ($anggota as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_anggota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="buku">Buku</label>
                        <select class="form-control" name="buku" id="buku" required>
                            <option value="">-Pilih Buku-</option>
                            @foreach ($buku as $item)
                                <option value="{{ $item->id }}">{{ $item->kode_buku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="">-Pilih Status-</option>
                            <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ old('status') == 'dikembalikan' ? 'selected' : '' }}>
                                Dikembalikan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('peminjaman.index') }}">Kembali</a>
                    </div>

                </form>

            </div>

        </div>
    @endsection
