@section('title'){{'Kategori'}} @endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penerbit</title>
</head>

<body>
    <h1>Daftar Nama Penerbit</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('penerbit.create') }}">Tambah Penerbit</a>

    <ul>
        @foreach ($penerbit as $penerbit)
            <li>{{ $penerbit->name }}</li>
        @endforeach
    </ul>
</body>

</html>
