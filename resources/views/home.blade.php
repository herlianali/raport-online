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
                <div class="card-icon bg-primary">
                    <a href="{{url('/home')}}" class="color-white"><i class="fas fa-user-graduate"></i></a>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Guru</h4>
                    </div>
                    <div class="card-body">
                        10
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <a href="{{url('/home')}}" class="color-white"><i class="fas fa-users"></i></a>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Siswa</h4>
                    </div>
                    <div class="card-body">
                        40
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <a href="{{route('kelas.index')}}" class="color-white"><i class="fas fa-school"></i></a>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kelas</h4>
                    </div>
                    <div class="card-body">
                        {{ @count($kelas) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <a href="{{route('mapel.index')}}" class="color-white"><i class="fas fa-book"></i></a>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        {{ @count($mapel) }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    </section>
</div>

@endsection
