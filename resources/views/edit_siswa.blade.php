@extends('layouts.home')
@section('title', 'Edit Data Siswa')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Siswa</h1>
    </div>

    <div class="card">
            <div class="card-header">
                <h4>Edit Data Siswa</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('siswa.update',$siswa->nis) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-6">
                        <label for="nis">No Induk Siswa</label>
                        <input id="nis" type="text" class="form-control @error('nis')
                            is-invalid
                        @enderror" name="nis" value="{{ $siswa->nis }}" autocomplete="nis" readonly>
                        @error('nis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="nisn">NISN</label>
                        <input id="nisn" type="text" class="form-control" name="nisn" value="{{ $siswa->nisn }}" autocomplete="nisn">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control @error('nama')
                        is-invalid
                    @enderror" name="nama" value="{{ $siswa->nama }}" autocomplete="nama">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="tpt_lahir">Tempat Lahir</label>
                        <input id="tpt_lahir" type="text" class="form-control @error('tpt_lahir')
                            is-invalid
                        @enderror" name="tpt_lahir" value="{{ $siswa->tpt_lahir }}" autocomplete="tpt_lahir">
                        @error('tpt_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tgl_lahir')
                            is-invalid
                        @enderror" name="tgl_lahir" id="tgl_lahir" value="{{ $siswa->tgl_lahir }}">
                        @error('tgl_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3" >{{ $siswa->alamat }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <div class="form-group">
                            <img src="{{ Storage::url('public/siswas/'.$siswa->foto) }}" height="200" width="200" alt="gambar"/>
                        </div>
                        <label for="foto">Foto</label>
                            <input type="file" id="foto" name="foto" accept="image/*"
                            class="form-control @error('foto') is-invalid @enderror">
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="L" {{ (old('jenis_kelamin')??$siswa->jenis_kelamin) =='L' ? 'checked': '' }}>
                                <label for="laki-laki" class="form-check-label">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" {{ (old('jenis_kelamin')??$siswa->jenis_kelamin)=='P' ? 'checked': '' }}>
                                <label for="perempuan" class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="tlp">Telepon/Hp</label>
                        <input id="tlp" type="text" class="form-control @error('tlp')
                            is-invalid
                        @enderror" name="tlp" value="{{ $siswa->tlp }}" autocomplete="tlp">
                        @error('tlp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label class="form-label">Kelas</label>
                        <select class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas">
                            @foreach ($kelas as $k)
                            <option value="{{ $k->id_kelas }}" {{ $k->id_kelas == $siswa->kelas_id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" value="{{ $siswa->password }}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="form-group col-6">
                    <label for="password-confirm" class="d-block">Password Confirmation</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" value="{{ $siswa->password }}">
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Ubah Data
                    </button>
                </div>
                </form>
            </div>
    </div>

    </section>
</div>

@endsection
