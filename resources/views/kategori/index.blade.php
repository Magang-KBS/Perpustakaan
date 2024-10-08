@extends('layout.app')
@section('title'){{'Kategori'}} @endsection
@section('content')
@if (session()->has('message'))
<p class="alert alert-info">{{session('message')}}</p>
@endif
    <div class="card mb-3">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
                <div class="col">
                    <input class="form-control" name="q" value="{{$q}}" placeholder="Cari...">
                </div>
                <div class="col">
                    <button class="btn btn-success">Refresh</button>
                </div>
                
                <div class="col">
                    <a class="btn btn-primary" href="{{route('kategori.tambah_kat')}}">Tambah</a> 
                </div>
               
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr class="text-center fw-bold">
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <?php //$no = 1;?>
                    @foreach ($kategoris as $kategori)
                    <tr class="text-center">
                        <td>{{$no++}}</td>
                        <td>{{$kategori->nama_kategori}}</td>
                        <td>{{$kategori->deskripsi}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{route('kategori.edit_kat',$kategori->id)}}">Ubah</a>
                            <form method="POST" class="d-inline" action="{{route('kategori.destroy',$kategori)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>   
                    @endforeach
            </table>

        </div>
        @if ($kategoris->hasPages())
        <div class="card-footer">
            {{$kategoris->links()}}
        </div>
    
@endif
    </div>
    
@endsection