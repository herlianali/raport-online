@extends('layouts.home')
@section('title', 'Beranda')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">

                <a href="{{route('guru.index')}}" class="color-white">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </a>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Guru</h4>
                    </div>
                    <div class="card-body">
                        {{ $guru }}
                        {{-- {{ $guru; }} --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('siswa.index')}}" class="color-white">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                </a>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Siswa</h4>
                    </div>
                    <div class="card-body">
                        {{-- {{ @count($siswa) }} --}}
                        {{ $siswa }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('kelas.index')}}" class="color-white">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-school"></i>
                    </div>
                </a>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kelas</h4>
                    </div>
                    <div class="card-body">
                        {{-- {{ @count($kelas) }} --}}
                        {{ $kelas }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('mapel.index')}}" class="color-white">
                    <div class="card-icon bg-info">
                        <i class="fas fa-book"></i>
                    </div>
                </a>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        {{-- {{ @count($mapel) }} --}}
                        {{ $mapel }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    </section>
</div>

@endsection
