@extends('layout.admin.main')

@section('title', 'Data Nilai-Nilai | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.kelolaLanding.profil')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Nilai-Nilai Sekolah</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Judul</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $nilaiSekolah->judul }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Deskripsi</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {!! $nilaiSekolah->deskripsi !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Logo</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            <img src="{{ asset('front/img/images/nilai/' . $nilaiSekolah->logo) }}" alt=""
                                height="80px">
                        </div>
                    </div>

                    <div class="form-group">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#editModal">Ubah</button>


                        @if ($nilaiSekolah->logo != null)
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#editLogoModal">
                                Ganti Logo</button>
                        @else
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#editLogoModal">
                                Upload Logo</button>
                        @endif
                        {{-- <form action="{{ route('dataNilaiSekolah.destroy', $nilaiSekolah->id) }}" class="d-inline"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="deleteFunction()">Hapus</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.landing.profil.nilaiSekolah.edit')
    @include('pages.admin.landing.profil.nilaiSekolah.editLogo')

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
