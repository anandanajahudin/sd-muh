@extends('layout.admin.main')

@section('title', 'Data Program Unggulan | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Program Unggulan</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Judul</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $dataProgramUnggulan->judul }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Deskripsi</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {!! $dataProgramUnggulan->deskripsi !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Logo</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            @if ($dataProgramUnggulan->logo != null)
                                @if (file_exists('repo/programUnggulan/' . $dataProgramUnggulan->id . '/' . $dataProgramUnggulan->logo))
                                    <a href="{{ asset('repo/programUnggulan/' . $dataProgramUnggulan->id . '/' . $dataProgramUnggulan->logo) }}"
                                        class="btn btn-info btn-sm" target="_blank">
                                        Preview
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Detail Program Unggulan</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            <a href="{{ route('dataProgramUnggulan.detail', $dataProgramUnggulan->id) }}"
                                class="btn btn-primary btn-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                            auth()->user()->jenis == 'admin' ||
                            auth()->user()->jenis == 'Bendahara')
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#editProgramUnggulanModal">
                            Ubah</button>

                        @if ($dataProgramUnggulan->logo != null)
                            @if (file_exists('repo/programUnggulan/' . $dataProgramUnggulan->id . '/' . $dataProgramUnggulan->logo))
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editFileProgramUnggulanModal">
                                    Ganti Logo</button>
                            @else
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#editFileProgramUnggulanModal">
                                    Upload Logo</button>
                            @endif
                        @else
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#editFileProgramUnggulanModal">
                                Upload Logo</button>
                        @endif

                        <form action="{{ route('dataProgramUnggulan.destroy', $dataProgramUnggulan->id) }}" class="d-inline"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="deleteFunction()">Hapus</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.master_data.programUnggulan.edit')
    @include('pages.admin.master_data.programUnggulan.editFile')

@endsection

<script>
    function deleteFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Anda yakin ingin menghapus?",
                // text: "But you will still be able to retrieve this file.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya!",
                cancelButtonText: "Tidak!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    form.submit(); // submitting the form when user press yes
                } else {
                    // swal("Cancelled", "Your imaginary file is safe :)", "error");
                    swal("Dibatalkan", "", "error");
                }
            });
    }
</script>
