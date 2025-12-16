@extends('layout.admin.main')

@section('title', 'Data Siswa General | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
<div class="container-fluid">

    <h4 class="mb-3">Edit Siswa General</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('siswaGeneral.dashboard.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                    <input type="text"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $siswa->nama) }}"
                           required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="number"
                           name="kelas"
                           class="form-control @error('kelas') is-invalid @enderror"
                           value="{{ old('kelas', $siswa->kelas) }}">
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <a href="{{ route('siswaGeneral.dashboard.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
