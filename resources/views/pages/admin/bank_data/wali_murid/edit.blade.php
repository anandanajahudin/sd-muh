@extends('layout.admin.main')

@section('title', 'Data Wali Murid | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
<div class="container-fluid">

    <h4 class="mb-3">Edit Wali Murid</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('waliMurid.dashboard.update', $wali->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Wali <span class="text-danger">*</span></label>
                    <input type="text"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $wali->nama) }}"
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
                           value="{{ old('kelas', $wali->kelas) }}">
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <a href="{{ route('waliMurid.dashboard.index') }}" class="btn btn-secondary">
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
