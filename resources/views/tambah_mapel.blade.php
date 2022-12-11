@extends('layouts.home')
@section('title', 'Tambah Kelas')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Kelas</h1>
    </div>

    <div class="card">
        <form action="{{ route('mapel.store') }}" method="POST" class="needs-validation"
            novalidate="">
            @csrf
            <div class="card-header">
                <h4>Tambah Kelas</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Mata Pelajaran</label>
                    <div class="col-sm-9">
                        <input type="text" id="nama_mapel" name="nama_mapel"
                            class="form-control"
                            required="">
                        <div class="invalid-feedback">
                            Masukkan Nama Mata Pelajaran
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
    </div>

    </section>
</div>

@endsection
