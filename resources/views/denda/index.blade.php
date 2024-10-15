@extends('layout.app')
@section('title'){{'Denda'}} @endsection
@section('content')
@if (session()->has('message'))
    <p class="alert alert-info">{{ session('message') }}</p>
@endif

<div class="card mb-3">
    <div class="card-header">
        <from class="row row-cols-auto g-1">
            <div class="col">
                <a class="btn btn-primary" href="{{route('denda.create')}}">Tambah</a>
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
                    <th>ID Pinjam</th>
                    <th>ID Anggota</th>
                    <th>Jumlah (Rp)</th>
                    <th>Notes</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
                @foreach ($dendas as $denda)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $denda->id_pinjam }}</td>
                    <td>{{ $denda->id_anggota }}</td>
                    <td>{{ $denda->jumlah_denda }}</td>
                    <td>{{ $denda->notes }}</td>
                    <td> 
                        
                        <a href="{{ route('denda.edit', $denda->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('denda.destroy', $denda->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data denda ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{ $dendas->links() }}
        </table>
    </div>
</div>

@endsection
