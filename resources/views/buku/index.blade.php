@extends('layout.app')
@section('content')
<head><title>{{ $title }}</title></head>

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
                    <button class="btn btn-success">Cari</button>
                </div>
                
                <div class="col">
                    <a class="btn btn-primary" href="{{route('buku.create')}}">Tambah</a> 
                </div>
               
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Judul Buku</th>
                        <th>Kode Buku</th>
                        <th>Kategori Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Stok Buku</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <?php //$no = 1;?>
                    @foreach ($bukus as $buku)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$buku->kode_buku}}</td>
                        <td>{{$buku->judul}}</td>
                        <td>{{$buku->kategori}}</td>
                        <td>{{$buku->pengarang}}</td>
                        <td>{{$buku->penerbit}}</td>
                        <td>{{$buku->tahun_terbit}}</td>
                        <td>{{$buku->stok}}</td>
                        <td>
                           
                            <a class="btn btn-sm btn-warning" href="{{route('buku.edit',$anggota->id)}}">Ubah</a>
                       
                           <form method="POST" class="d-inline" action="{{route('buku.destroy',$anggota)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>
                         
                           

                        </td>
                    </tr>
                        
                    @endforeach

            </table>

        </div>
        @if ($bukus->hasPages())
        <div class="card-footer">
            {{$bukus->links()}}
        </div>
    
@endif
    </div>
    
@endsection