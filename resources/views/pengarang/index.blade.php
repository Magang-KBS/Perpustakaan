<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengarang</title>
</head>
<body>
    <h1>Daftar Nama Pengarang</h1>
    
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('pengarang.create') }}">Tambah Pengarang</a>

    <ul>
        @foreach ($pengarang as $pengarang)
            <li>{{ $pengarang->name }}</li> 
        @endforeach
    </ul>
</body>
</html>

