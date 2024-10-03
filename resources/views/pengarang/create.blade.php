<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengarang</title>
</head>
<body>
    <h1>Tambah Nama Pengarang</h1>

    <form action="{{ route('pengarang.store') }}" method="POST">
        @csrf 
        <label for="name">Nama Pengarang:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="id">ID Pengarang:</label>
        <input type="number" name="id" id="id" required>
        <br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('pengarang.index') }}">Kembali</a>
</body>
</html>
