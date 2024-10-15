<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.perpustakaan', 'Perpustakaan') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/zepbootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <style>
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #000;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }
        .nav-link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
        .nav-link:hover {
            color: #007bff;
        }
        .nav-link.active::after {
            transform: scaleX(1); /* Untuk mempertahankan efek garis bawah */
            transform-origin: bottom left;
        }
        .nav-link.active {
            color: #007bff; /* Warna teks saat menu aktif */
        }
    </style>

</head>

<body class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                            <i class="fa fa-home"></i><b>Home</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('user*') ? 'active' : '' }}" href="">
                            <i class="fa fa-user"></i><b>User</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('anggota*') ? 'active' : '' }}" href="{{ route('anggota.index') }}">
                            <i class="fa fa-users"></i><b>Anggota</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('buku*') ? 'active' : '' }}" href="">
                            <i class="fa fa-book"></i><b>Buku</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('pinjam*') ? 'active' : '' }}" href="">
                            <i class="fa fa-tags"></i><b>Pinjam</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('pengarang*') ? 'active' : '' }}" href="{{ route('pengarang.index') }}">
                            <i class="fa fa-user"></i><b>Pengarang</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kategori*') ? 'active' : '' }}" href="">
                            <i class="fa fa-list"></i><b>Kategori</b>
                        </a>
                    </li>
                    <<<<<<< HEAD=======>>>>>>> 16fccd3 (CRUD penerbit)
                        <li class="nav-item">
                            <a class=" nav-link active" aria-current="page" href="{{ route('anggota.index') }}"> <i
                                    class="fa fa-users"></i> Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link active" aria-current="page" href=""><i class="fa fa-book"></i>
                                Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link active" aria-current="page" href=""><i class="fa fa-tags"></i>
                                Pinjam</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link active" aria-current="page" href=""> <i class="fa fa-list"></i>
                                Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link active" aria-current="page" href="{{ route('penerbit.index') }}"> <i
                                    class="fa-regular fa-building"></i>
                                Penerbit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('anggota*') ? 'active' : '' }}"
                                href="{{ route('anggota.index') }}">
                                <i class="fa fa-users"></i><b>Anggota</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('penerbit*') ? 'active' : '' }}"
                                href="{{ route('penerbit.index') }}">
                                <i class="fa fa-book"></i><b>Penerbit</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('buku*') ? 'active' : '' }}" href=" ">
                                <i class="fa fa-book-open"></i><b>Buku</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pengarang*') ? 'active' : '' }}" href=" ">
                                <i class="fa fa-user"></i><b>Pengarang</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('kategori*') ? 'active' : '' }}" href=" ">
                                <i class="fa fa-list"></i><b>Kategori</b>
                            </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('denda*') ? 'active' : '' }}" href="{{ route('denda.index') }}">
                            <i class="fa fa-dollar-sign"></i><b>Denda</b>
                        </a>
                    </li>
                </ul>
                <div class="nav-item">
                    <a class="nav-link" onclick="return confirm('Yakin Logout?')" href="">
                        <i class="fa fa-logout"></i><b>Logout</b>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
