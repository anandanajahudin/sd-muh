@extends('layout.admin.main')

@section('title', 'Data Siswa General | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Siswa General</h4>
        <a href="{{ route('siswaGeneral.dashboard.create') }}" class="btn btn-primary">
            + Tambah Siswa
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
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($siswa as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->kelas }}</td>
                        <td>{{ $s->user->email }}</td>
                        <td>{{ $s->user->name }}</td>
                        <td width="150px">
                            <a href="{{ route('siswaGeneral.dashboard.edit', $s->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            {{-- <form action="{{ route('siswaGeneral.dashboard.destroy', $s->id) }}"
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
