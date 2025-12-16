@extends('layout.admin.main')

@section('title', 'Data Pesan | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.kelolaLanding.pesan')
@endsection

@section('content')
<!-- Basic table card start -->
<div class="card">
    <div class="card-header">
        <h5>Data Pesan</h5>
    </div>

    <div class="card-block">

        <div class="row">
            <div class="col-lg-8 col-xl-12">
                <div class="form-group row">
                    <label class="col-lg-2 col-xl-2 col-form-label"><b>Nama</b></label>
                    <div class="col-lg-10 col-xl-10 col-form-label">
                        {{ $pesan->nama }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-xl-2 col-form-label"><b>No. HP</b></label>
                    <div class="col-lg-10 col-xl-10 col-form-label">
                        {{ $pesan->telp }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-xl-2 col-form-label"><b>Email</b></label>
                    <div class="col-lg-10 col-xl-10 col-form-label">
                        {{ $pesan->email }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-xl-2 col-form-label"><b>Pesan</b></label>
                    <div class="col-lg-10 col-xl-10 col-form-label">
                        {{ $pesan->pesan }}
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="button" class="btn btn-sm btn-warning"
                        data-toggle="modal" data-target="#editPesanModal">Ubah</button>

                    <form action="{{ route('dataPesan.destroy', $pesan->id) }}" class="d-inline" method="POST">
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

@include('pages.admin.landing.pesan.edit')

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
