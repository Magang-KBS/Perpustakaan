@extends('layout.app')
@section('content')
@if (session()->has('message'))
    <p class="alert alert-info">{{ session('message') }}</p>
@endif

<div class="card mb-3">
    <div class="card-header">
        <from class="row row-cols-auto g-1">
            <div class="col">
                <a class="btn btn-primary" href="{{route('pengarang.create')}}">Tambah</a>
            </div>
        </form>    
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped m-0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Pengarang</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
                @foreach ($pengarangs as $pengarang)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pengarang->nama_pengarang }}</td>
                    <td> 
                        <form action="{{ route('pengarang.destroy', $pengarang->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengarang ini?')">Hapus</button>
                        </form>
                        <a href="{{ route('pengarang.edit', $pengarang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{ $pengarangs->links() }}
        </table>
    </div>
</div>

@endsection
