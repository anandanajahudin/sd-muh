@extends('layout.admin.main')

@section('title', 'Data Modul | SekolahKarakter24')

@section('sidebar')
    @if(auth()->user()->jenis != 'siswa' && auth()->user()->jenis != 'walimurid' && auth()->user()->jenis != 'siswageneral')
        @include('layout.admin.partials.sidebar.bank')
    @else
        @include('layout.admin.partials.sidebar.modul')
    @endif
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Modul</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <table class="table">
                        <tr>
                            <th>Kelas</th>
                            <td>{{ $dataModul->modulKelas->kelas . ' (' . $dataModul->modulKelas->jenis . ')' }}</td>
                        </tr>
                        <tr>
                            <th>Judul Modul</th>
                            <td>{{ $dataModul->judul }}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>{{ $dataModul->jenisModul->judul }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $dataModul->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>File</th>
                            <td>
                                @if ($dataModul->file != null)
                                    @if (file_exists('repo/modul/' . $dataModul->id_kelas_master . '/' . $dataModul->id . '/' . $dataModul->file))
                                        <a href="{{ asset('repo/modul/' . $dataModul->id_kelas_master . '/' . $dataModul->id . '/' . $dataModul->file) }}"
                                            class="btn btn-info btn-sm" target="_blank">
                                            Preview
                                        </a>
                                    @endif
                                @endif
                                {{-- @if ($dataModul->file != null)
                                @if (file_exists('storage/modul/' . $dataModul->id_kelas_master . '/' . $dataModul->id . '/' . $dataModul->file))
                                    <a href="{{ asset('storage/modul/'.$dataModul->id_kelas_master.'/'.$dataModul->id.'/'.$dataModul->file) }}" class="btn btn-info btn-sm" target="_blank">
                                        Preview
                                    </a>
                                @endif
                            @endif --}}
                            </td>
                        </tr>
                        <tr>
                            <th>Ukuran File</th>
                            <td>

                                @if ($dataModul->file != null)
                                    @if ($dataModul->ukuran_file != null)
                                        @if (file_exists('repo/modul/' . $dataModul->id_kelas_master . '/' . $dataModul->id . '/' . $dataModul->file))
                                            @number($dataModul->ukuran_file / 1024) KB
                                        @endif
                                    @endif
                                @endif
                                {{-- @if ($dataModul->file != null)
                                @if ($dataModul->ukuran_file != null)
                                    @if (file_exists('storage/modul/' . $dataModul->id_kelas_master . '/' . $dataModul->id . '/' . $dataModul->file))
                                        @number(($dataModul->ukuran_file / 1024)) KB
                                    @endif
                                @endif
                            @endif --}}

                                {{-- @number(($dataModul->ukuran_file / 1048576)) MB --}}
                                {{-- @decimal(($dataModul->ukuran_file / 1048576)) --}}
                            </td>
                        </tr>
                        <tfoot>
                            <tr>
                                <th colspan="2">
                                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>

                                    @if (auth()->user()->jenis == 'Kepala Sekolah' ||
                                            auth()->user()->jenis == 'admin' ||
                                            auth()->user()->jenis == 'Bendahara')
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editModulModal">
                                            Ubah</button>

                                        @if ($dataModul->file != null)
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#editFileModulModal">
                                                Ganti File</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#editFileModulModal">
                                                Upload File</button>
                                        @endif

                                        <form action="{{ route('dataModul.destroy', $dataModul->id) }}" class="d-inline"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="deleteFunction()">Hapus</button>
                                        </form>
                                    @endif
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.bank_data.modul.edit')
    @include('pages.admin.bank_data.modul.editFile')

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
