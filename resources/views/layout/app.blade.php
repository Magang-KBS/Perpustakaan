<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{config('app.perpustakaan','Perpustakaan')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/zepbootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
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
                        <a class=" nav-link active" aria-current="page" href="{{route('home')}}"> <i class="fa fa-home"></i> Home</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('petugas.index')}}"><i class="fa fa-user"></i><b>Petugas</b> </a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link active" aria-current="page" href="{{route('anggota.index')}}"> <i class="fa fa-users"></i> Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link active" aria-current="page" href=""><i class="fa fa-book"></i> Buku</a>
                    </li>
                    <li class="nav-item">
                      <a class=" nav-link active" aria-current="page" href=""><i class="fa fa-tags"></i>  Pinjam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('pengarang.index')}}"> <i class="fa fa-user"></i> Pengarang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('penerbit.index')}}"> <i class="fa fa-user"></i> Penerbit</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link active" aria-current="page" href="{{route('kategori.index')}}"> <i class="fa fa-list"></i> Kategori</a>
                    </li>
                </ul>
                <div class="nav-item">
                    <a class="nav-link active" aria-current="page" onclick="return confirm('Yakin Logout?')" href=""><i class="fa fa-logout"></i> Logout</a>
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
