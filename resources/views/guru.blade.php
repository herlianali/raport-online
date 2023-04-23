@extends('layouts.home')
@section('title', 'Guru')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Guru</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('guru.create') }}" class="btn btn-primary"><i
                class="fas fa-plus text-white-50"></i> Tambah Data Guru</a>
        </div>
    </div>

    @if ($message = Session::get('status'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
    @endif


    <div class="card">
        <div class="card-header">
            <h4>Data Guru</h4>

        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table-striped table-md table">
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Status Wali Murid</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                    @forelse ($guru as $g)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img class="card-img-top" src="{{ Storage::url('public/gurus/'.$g->foto) }}" width="50px"></td>
                            <td>{{ $g->nip }}</td>
                            <td>{{ $g->nama }}</td>
                            <td>{{ $g->mapel->nama_mapel }}</td>
                            <td>{{ $g->tpt_lahir }},
                            {{ $g->tgl_lahir }}</td>
                            <td>{{ $g->alamat }}</td>
                            <td>{{ $g->jenis_kelamin == 'P'?'Perempuan':'Laki-Laki' }}</td>
                            <td>{{ $g->tlp }}</td>
                            <td>{{ $g->status_wali == "1"?'Ya':'Tidak' }}</td>
                            <td>{{ $g->password }}</td>
                            <td>
                                <form method="POST" action="{{ route('guru.destroy',
                                ['guru' => $g->nip]) }}">
                                <a href="{{ route('guru.edit',$g->nip) }}" class="btn btn-warning">Edit</a>

                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="10" class="text-center">Tidak ada data...</td>
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
