@extends('layout.admin.main')

@section('title', 'Data Ekskul | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Ekskulikuler</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Judul</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $dataEkskul->judul }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Jenis</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $dataEkskul->jenis }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Deskripsi</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {!! $dataEkskul->deskripsi !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Logo</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            @if ($dataEkskul->logo != null)
                                @if (file_exists('repo/ekskul/' . $dataEkskul->id . '/' . $dataEkskul->logo))
                                    <a href="{{ asset('repo/ekskul/' . $dataEkskul->id . '/' . $dataEkskul->logo) }}"
                                        class="btn btn-info btn-sm" target="_blank">
                                        Preview
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Detail Ekskul</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            <a href="{{ route('dataEkskul.detail', $dataEkskul->id) }}" class="btn btn-primary btn-sm">
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
                            data-target="#editEkskulModal">
                            Ubah</button>

                        @if ($dataEkskul->logo != null)
                            @if (file_exists('repo/ekskul/' . $dataEkskul->id . '/' . $dataEkskul->logo))
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editFileEkskulModal">
                                    Ganti Logo</button>
                            @else
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#editFileEkskulModal">
                                    Upload Logo</button>
                            @endif
                        @else
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#editFileEkskulModal">
                                Upload Logo</button>
                        @endif

                        <form action="{{ route('dataEkskul.destroy', $dataEkskul->id) }}" class="d-inline" method="POST">
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

    @include('pages.admin.master_data.ekskul.edit')
    @include('pages.admin.master_data.ekskul.editFile')

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
