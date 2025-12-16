@extends('layout.admin.main')

@section('title', 'Data Guru General | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
<div class="container-fluid">

    <h4 class="mb-3">Tambah Guru General</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('guruGeneral.dashboard.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Guru <span class="text-danger">*</span></label>
                    <input type="text"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}"
                           required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas <span class="text-danger">*</span></label>
                    <input type="number"
                           name="kelas"
                           class="form-control @error('kelas') is-invalid @enderror"
                           value="{{ old('kelas') }}">
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <a href="{{ route('guruGeneral.dashboard.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
