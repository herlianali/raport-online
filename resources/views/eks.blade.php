@extends('layouts.home')
@section('title', 'Ekstrakulikuler')

@section('content')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Data Ekstrakulikuler</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('eks.create') }}" class="btn btn-primary"><i
                class="fas fa-plus text-white-50"></i> Tambah Nama Ekstrakulikuler</a>
        </div>
    </div>

    @if ($message = Session::get('status'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
    @endif


    <div class="card">
        <div class="card-header">
            <h4>Data Ekstrakulikuler</h4>

        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table-striped table-md table">
                    <tr>
                        <th>Kode Ekstrakulikuler</th>
                        <th>Nama Ekstrakulikuler</th>
                        <th>Aksi</th>
                    </tr>
                    @forelse ($eks as $e)
                        <tr>
                            {{-- <td>{{$loop->iteration}}</td> --}}
                            <td>{{$e->id_eks}}</td>
                            <td>{{ $e->nama_ekstra }}</td>
                            <td>
                                <form method="POST" action="{{ route('eks.destroy',
                                ['ek' => $e->id_eks]) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="3" class="text-center">Tidak ada data...</td>
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
