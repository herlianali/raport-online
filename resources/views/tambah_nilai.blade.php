@extends('layouts.home')
@section('title', 'Tambah Nilai')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Nilai</h1>
    </div>

    <div class="card">
            <div class="card-header">
                <h4>Tambah Nilai</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('nilai.store') }}">
                @csrf

                <div class="row">
                    <div class="form-group col-6">
                        <label for="nis">Nama Siswa</label>
                        <select class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis">
                            <option value="" readonly>Pilih Siswa</option>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                        @error('nis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="kelas">Kelas</label>
                        <select class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas">
                            <option value="" readonly>Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control @error('mapel') is-invalid @enderror" id="mapel" name="mapel">
                            <option value="" readonly>Pilih Mata Pelajaran</option>
                            @foreach ($mapel as $m)
                                <option value="{{ $m->id_mapel }}">{{ $m->nama_mapel }}</option>
                            @endforeach
                        </select>
                        @error('mapel')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Semester</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="semester" id="semester" value="Ganjil" {{ old('smtr')=='Ganjil' ? 'checked': '' }}>
                                <label for="Ganjil" class="form-check-label">Ganjil</label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="semester" id="semester" value="Genap" {{ old('smtr')=='Genap' ? 'checked': '' }}>
                                <label for="Genap" class="form-check-label">Genap</label>
                            </div>

                        </div>
                        @error('semester')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-2">
                        <label for="nilai">Nilai</label>
                        <input id="nilai" type="number" class="form-control @error('nilai')
                            is-invalid
                        @enderror" name="nilai" value="{{ old('nilai') }}" autocomplete="nilai">
                        @error('nilai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Simpan Data
                    </button>
                </div>
                </form>
            </div>
    </div>

    </section>
</div>

@endsection
