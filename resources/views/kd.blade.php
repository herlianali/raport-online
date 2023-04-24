@extends('layouts.home')
@section('title', 'Nilai KD')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Nilai KD</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('kd.create') }}" class="btn btn-primary"><i
                class="fas fa-plus text-white-50"></i> Tambah Nilai KD</a>
        </div>
    </div>

    @if ($message = Session::get('status'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
    @endif


    <div class="card">
        <div class="card-header">
            <h4>Nilai KD</h4>

        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table-striped table-md table">
                    <tr>
                        <th>#</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                    @forelse ($kd as $k)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $k->siswa->nama}}</td>
                            <td>{{ $k->kelas->nama_kelas }}</td>
                            <td>{{ $k->smtr }}</td>
                            <td>{{ $k->nilai_kd }}</td>
                            <td>
                                <form method="POST" action="{{ route('kd.destroy',
                                ['kd' => $k->id_kd]) }}">
                                <a href="{{ route('kd.edit',$k->id_kd) }}" class="btn btn-warning">Edit</a>

                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="7" class="text-center">Tidak ada data...</td>
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
