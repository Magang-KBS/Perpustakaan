@extends('layout.app')
@section('title'){{'Petugas'}} @endsection
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
                    <a class="btn btn-primary" href="{{route('petugas.tambah_pet')}}">Tambah</a> 
                </div>
               
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr class="text-center fw-bold">
                        <th>ID Petugas</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email Petugas</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <?php //$no = 1;?>
                    @foreach ($petugass as $petugas)
                    <tr class="text-center">
                        <td>{{$no++}}</td>
                        <td>{{$petugas->nama_petugas}}</td>
                        <td>{{$petugas->username}}</td>
                        <td>{{$petugas->password}}</td>
                        <td>{{$petugas->email_petugas}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{route('petugas.edit_pet',$petugas->id)}}">Ubah Data Diri</a>
                            <form method="POST" class="d-inline" action="{{route('petugas.destroy',$petugas)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>   
                    @endforeach
            </table>

        </div>
        @if ($petugass->hasPages())
        <div class="card-footer">
            {{$petugass->links()}}
        </div>
    
@endif
    </div>
    
@endsection