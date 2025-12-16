@extends('layout.admin.main')

@section('title', 'Data Master Kelas | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Master Kelas</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Judul</b></label>
                        <div class="col-lg-9 col-xl-9">{{ $kelasMaster->judul }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Jenis</b></label>
                        <div class="col-lg-9 col-xl-9">{{ $kelasMaster->jenis }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Kelas</b></label>
                        <div class="col-lg-9 col-xl-9">{{ $kelasMaster->kelas }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Biaya Daftar Ulang</b></label>
                        <div class="col-lg-9 col-xl-9">@currency($kelasMaster->biaya_daful)</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Biaya SPP</b></label>
                        <div class="col-lg-9 col-xl-9">@currency($kelasMaster->spp)</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Keterangan</b></label>
                        <div class="col-lg-9 col-xl-9">{!! $kelasMaster->keterangan !!}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Deksripsi</b></label>
                        <div class="col-lg-9 col-xl-9">{!! $kelasMaster->deskripsi !!}</div>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                            auth()->user()->jenis == 'admin' ||
                            auth()->user()->jenis == 'Bendahara')
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#editKelasMasterModal">
                            Ubah</button>
                        <form action="{{ route('kelasMaster.destroy', $kelasMaster->id) }}" class="d-inline" method="POST">
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

    @include('pages.admin.bank_data.kelas.master.edit')

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
