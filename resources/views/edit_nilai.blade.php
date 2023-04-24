@extends('layouts.home')
@section('title', 'Edit Data Nilai')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Data Nilai</h1>
    </div>

    <div class="card">
            <div class="card-header">
                <h4>Edit Data Nilai</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('nilai.update',$nilai->id_nilai) }}" >
                @csrf
                @method('PUT')

                {{-- <div class="row">
                    <div class="form-group col-6">
                        <label for="nis">Nama Siswa</label>
                        <select class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis">
                            <option value="{{ $ekstra->id_ekstra }}" readonly>{{ $ekstra->siswa->nama }}</option>
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label for="kelas">Kelas</label>
                        <select class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas">
                            <option value="{{ $ekstra->kelas_id }}" readonly>{{ $ekstra->kelas->nama_kelas }}</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="ekstra">Ekstrakulikuler</label>
                        <select class="form-control @error('ekstra') is-invalid @enderror" id="ekstra" name="ekstra">
                            <option value="{{ $ekstra->eks_id }}" readonly>{{ $ekstra->ekstra->nama_ekstra }}</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Semester</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="semester" id="semester" value="Ganjil" {{ (old('smtr') ?? $ekstra->smtr)=='Ganjil' ? 'checked': '' }} readonly>
                                <label for="Ganjil" class="form-check-label">Ganjil</label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="semester" id="semester" value="Genap" {{ (old('smtr') ?? $ekstra->smtr) =='Genap' ? 'checked': '' }} readonly>
                                <label for="Genap" class="form-check-label">Genap</label>
                            </div>

                        </div>
                        @error('semester')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}

                <div class="row">
                    <div class="form-group col-2">
                        <label for="nilai">Nilai</label>
                        <input id="nilai" type="number" class="form-control @error('nilai')
                            is-invalid
                        @enderror" name="nilai" value="{{ $nilai->nilai_smtr}}" autocomplete="nilai">
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
