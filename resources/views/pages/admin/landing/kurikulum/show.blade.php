@extends('layout.admin.main')

@section('title', 'Data Kurikulum | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.kelolaLanding.profil')
@endsection

@section('content')
<!-- Basic table card start -->
<div class="card">
    <div class="card-header">
        <h5>Data Kurikulum Sekolah</h5>
    </div>

    <div class="card-block">

        <div class="row">
            <div class="col-lg-8 col-xl-12">
                <div class="form-group row">
                    <label class="col-lg-2 col-xl-2 col-form-label"><b>Judul</b></label>
                    <div class="col-lg-10 col-xl-10 col-form-label">
                        {{ $kurikulum->judul }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-xl-2 col-form-label"><b>Deskripsi</b></label>
                    <div class="col-lg-10 col-xl-10 col-form-label">
                        {!! $kurikulum->deskripsi !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-xl-2 col-form-label"><b>Detail Kurikulum</b></label>
                    <div class="col-lg-10 col-xl-10 col-form-label">
                        {{-- @foreach ($detailKurikulum as $detailKurikulum)
                            <a href="{{ route('dataDetailKurikulum').'/'.$detailKurikulum->id }}">
                                <div class="mt-2 mb-2">{{ $loop->iteration . '. ' .$detailKurikulum->judul }}</div>
                            </a>
                        @endforeach --}}
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="button" class="btn btn-sm btn-warning"
                        data-toggle="modal" data-target="#editKurikulumModal">Ubah</button>

                    <form action="{{ route('dataKurikulum.destroy', $kurikulum->id) }}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="deleteFunction()">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Basic table card end -->

@include('pages.admin.landing.kurikulum.edit')

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
        function(isConfirm){
            if (isConfirm) {
                form.submit();          // submitting the form when user press yes
            } else {
                // swal("Cancelled", "Your imaginary file is safe :)", "error");
                swal("Dibatalkan", "", "error");
            }
        });
    }
</script>
