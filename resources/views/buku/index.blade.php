@extends('layout.app')
@section('title'){{'Buku'}} @endsection
@section('content')
@if (session()->has('message'))
    <p class="alert alert-info">{{ session('message') }}</p>
@endif

<div class="card mb-3">
    <div class="card-header">
        <from class="row row-cols-auto g-2">
            <div class="col">
                <a class="btn btn-primary" href="{{route('buku.create')}}">Tambah</a>
            </div>
            <div>
                <button onclick="location.reload();" class="btn btn-success">Refresh</button>
            </div>

        </form>    
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped m-0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Pengarang</th>
                    <th>Sampul Buku</th>                                        
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
                @foreach ($bukus as $buku)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $buku->kode_buku }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>{{ $buku->kategori->nama_kategori ?? 'N/A' }}</td> 
                    <td>{{ $buku->pengarang->nama_pengarang ?? 'N/A' }}</td>
                    <td>
                        <img src="/sampuls/{{ $buku->sampul_buku }}" width="100" alt="Sampul Buku">
                    </td>
                    <td>{{ $buku->stok }}</td>
                    <td> 
                        
                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{ $bukus->links() }}
        </table>
    </div>
</div>

@endsection
