@extends('layouts.home')
@section('title', 'Tambah Kelas')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Data Ekstrakulikuler</h1>
    </div>

    <div class="card">
        <form action="{{ route('eks.store') }}" method="POST" class="needs-validation"
            novalidate="">
            @csrf
            <div class="card-header">
                <h4>Tambah Data Ekstrakulikuler</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Ekstrakulikuler</label>
                    <div class="col-sm-9">
                        <input type="text" id="nama_ekstra" name="nama_ekstra"
                            class="form-control"
                            required="">
                        <div class="invalid-feedback">
                            Masukkan Nama Ekstrakulikuler
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Tambah Data</button>
            </div>
        </form>
    </div>

    </section>
</div>

@endsection
