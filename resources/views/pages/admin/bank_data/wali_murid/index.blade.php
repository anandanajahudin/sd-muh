@extends('layout.admin.main')

@section('title', 'Data Wali Murid | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Wali Murid</h4>
        <a href="{{ route('waliMurid.dashboard.create') }}" class="btn btn-primary">
            + Tambah Wali Murid
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
                        <th>Nama Wali</th>
                        <th>Kelas</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($wali as $w)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $w->nama }}</td>
                        <td>{{ $w->kelas }}</td>
                        <td>{{ $w->user->email }}</td>
                        <td>{{ $w->user->name }}</td>
                        <td width="150px">
                            <a href="{{ route('waliMurid.dashboard.edit', $w->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            {{-- <form action="{{ route('waliMurid.dashboard.destroy', $w->id) }}"
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
