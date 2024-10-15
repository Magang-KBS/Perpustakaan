<!DOCTYPE html>
<html>
<head>
    <title>Login Petugas</title>
</head>
<body>
    <h1>Login Petugas</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('petugas.login') }}">
        @csrf
        <div>
            <label for="login">Email atau Username</label>
            <input type="text" name="login" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
