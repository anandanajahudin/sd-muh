@extends('layout.admin.main')

@section('title', 'Data Testimoni | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.kelolaLanding.testimoni')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Testimoni Sekolah</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Nama</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            {{ $testimoni->nama }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Pekerjaan</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            {{ $testimoni->pekerjaan->judul }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Nilai</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            @if ($testimoni->nilai == 5)
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            @elseif ($testimoni->nilai == 4)
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            @elseif ($testimoni->nilai == 3)
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            @elseif ($testimoni->nilai == 2)
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            @else
                                <i class="ti-star"></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Testimoni</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            {{ $testimoni->testimoni }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Foto</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            @if (file_exists('repo/testimoni/' . $testimoni->foto))
                                <a href="{{ asset('repo/testimoni/' . $testimoni->foto) }}" class="btn btn-info btn-sm"
                                    target="_blank">
                                    Preview
                                </a>
                            @else
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Link Vidio Testimoni</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            {{ $testimoni->link }}
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>

                        @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                                auth()->user()->jenis == 'admin' ||
                                auth()->user()->jenis == 'Bendahara')

                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#editTestimoniModal">Ubah</button>

                            @if (file_exists('repo/testimoni/' . $testimoni->foto))
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#editGambarModal">Ganti Foto</button>
                            @else
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#editGambarModal">Upload Foto</button>
                            @endif

                            <form action="{{ route('dataTestimoni.destroy', $testimoni->id) }}" class="d-inline"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="deleteFunction()">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.landing.testimoni.edit')
    @include('pages.admin.landing.testimoni.editGambar')

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
