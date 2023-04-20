@extends('layouts.home')
@section('title', 'Siswa')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Siswa</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary"><i
                class="fas fa-plus text-white-50"></i> Tambah Data Siswa</a>
        </div>
    </div>

    @if ($message = Session::get('status'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
    @endif


    <div class="card">
        <div class="card-header">
            <h4>Data Siswa</h4>

        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table-striped table-md table">
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Nama Guru</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Kelas</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                    @forelse ($siswa as $s)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img class="card-img-top" src="{{ Storage::url('public/siswas/'.$s->foto) }}" width="50px"></td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->nisn }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->tpt_lahir }},
                            {{ $s->tgl_lahir }}</td>
                            <td>{{ $s->alamat }}</td>
                            <td>{{ $s->jenis_kelamin == 'P'?'Perempuan':'Laki-Laki' }}</td>
                            <td>{{ $s->tlp }}</td>
                            <td>{{ $s->kelas->nama_kelas }}</td>
                            <td>{{ $s->password }}</td>
                            <td>
                                <form method="POST" action="{{ route('siswa.destroy',
                                ['siswa' => $s->nis]) }}">
                                <a href="{{ route('siswa.edit',$s->nis) }}" class="btn btn-warning">Edit</a>

                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="12" class="text-center">Tidak ada data...</td>
                    @endforelse
                </table>
            </div>
        {{-- </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link"
                            href="#"
                            tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link"
                            href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                        <a class="page-link"
                            href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link"
                            href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link"
                            href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div> --}}
    </div>

    </section>
</div>

@endsection
