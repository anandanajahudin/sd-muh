@extends('layout.admin.main')

@section('title', 'Data Sifat Siswa | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Sifat Siswa</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Kelas</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            {{ $namaKelas }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Tahun Ajaran</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            {{ $tahunAjaran }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Siswa</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            {{ $nama }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>NIS</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            {{ $nis }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-xl-2 col-form-label"><b>Sifat Siswa</b></label>
                        <div class="col-lg-10 col-xl-10 col-form-label">
                            <ul>
                                @foreach ($sifatTerpilih as $sifatTerpilih)
                                    <li>{{ $sifatTerpilih->sifat->judul }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                            auth()->user()->jenis == 'admin' ||
                            auth()->user()->jenis == 'Bendahara')
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#editSifatSiswaModal">Ubah Data</button>

                        <form action="{{ route('sifatSiswa.destroy', $sifatTerpilih) }}" class="d-inline" method="POST">
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

    @include('pages.admin.bank_data.sifat_siswa.edit')

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
