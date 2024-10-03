@section('content')
    <div class="container">
        <h1>Tambah Penerbit Baru</h1>
        <form action="{{ route('penerbit.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Penerbit</button>
        </form>
    </div>
@endsection
