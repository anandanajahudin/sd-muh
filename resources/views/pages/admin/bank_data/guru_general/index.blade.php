@extends('layout.admin.main')

@section('title', 'Data Guru General | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Guru General</h4>
        <a href="{{ route('guruGeneral.dashboard.create') }}" class="btn btn-primary">
            + Tambah Guru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table">
                    <tr>
                        <th>#</th>
                        <th>Nama Guru</th>
                        <th>Kelas</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($guru as $g)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $g->nama }}</td>
                        <td>{{ $g->kelas }}</td>
                        <td>{{ $g->user->email }}</td>
                        <td>{{ $g->user->name }}</td>
                        <td width="150px">
                            <a href="{{ route('guruGeneral.dashboard.edit', $g->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            {{-- <form action="{{ route('guruGeneral.dashboard.destroy', $g->id) }}"
                                method="POST"
                                style="display:inline-block"
                                onsubmit="return confirm('Yakin hapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
