@extends('layout.app')
<title>Perpustakaan Home</title>
@section('content')
    @auth
        <p>Selamat Datang <b>{{ Auth::user()->username }}</b></p>
    @endauth
    <div class="row">

        {{--  <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-header">
                    <i class="fa-solid fa-user"></i> User
                </div>
                <div class="card-body">
                    <h3> {{ $jumlah_user }} Data user</h3>
                </div>
                <div class="card-footer text-end">

                    <a href="{{ route('user.index') }}" class="text-white text-decoration-none">Selengkapnya &raquo;</a>


                </div>
            </div>
        </div> --}}
        <div class="col-md-3">
            <div style="background-color: rgb(128, 0, 117)" class="card text-white">
                <div class="card-header">
                    <i class="fa-solid fa-handshake"></i> Total Peminjaman
                </div>
                <div class="card-body">
                    <h3> {{ $total_peminjaman }} Peminjaman</h3>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('peminjaman.index') }}" class="text-white text-decoration-none">Selengkapnya &raquo;</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-header">
                    <i class="fa-solid fa-users"></i> Jumlah Anggota
                </div>
                <div class="card-body">
                    <h3> {{ $jumlah_anggota }} Anggota</h3>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('anggota.index') }}"
                        class="text-white
                     text-decoration-none">Selengkapnya &raquo;</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-header">
                    <i class=" fa-solid fa-book "></i> Jumlah Penerbit
                </div>
                <div class="card-body">
                    <h3>{{ $jumlah_penerbit }} Penerbit</h3>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('penerbit.index') }}" class="text-white text-decoration-none">Selengkapnya &raquo;</a>
                </div>
            </div>
        </div>
        {{--  
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-header">
                    <i class="fa-solid fa-book"></i> Jumlah Pengarang
                </div>
                <div class="card-body">
                    <h3>{{ $jumlah_pengarang }} Pengarang</h3>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('pengarang.index') }}" class="text-white text-decoration-none">Selengkapnya
                        &raquo;</a>
                </div>
            </div>
        </div>
        --}}

        {{-- <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-header">
                        <i class="fa-solid fa-list"></i> Jumlah Kategori
                    </div>
                    <div class="card-body">
                        <h3> {{ $jumlah_kategori }} Kategori</h3>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('kategori.index') }}" class="text-white text-decoration-none">Selengkapnya &raquo;</a>
                    </div>
                </div>
            </div> 
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <div id="container" class="my-5"></div>
    {{-- <script>
        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Peminjaman 30 Hari Terakhir'
            },
            xAxis: {
                categories: <?= json_encode($categories) ?>
            },
            yAxis: {
                title: {
                    text: 'Total'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Peminjaman',
                data: <?= json_encode($data) ?>
            }]
        });
    </script> --}}
    @endsection
