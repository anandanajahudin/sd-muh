@extends('layout.admin.main')

@section('title', 'Data Wali Kelas | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Wali Kelas</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-6">
                    <table class="table">
                        <tr>
                            <th>Tahun Ajaran</th>
                            <td>{{ $kelasSiswa->tahun_ajaran }}</td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td>{{ $kelasSiswa->tahun }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>{{ $kelasSiswa->namaKelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <th>Wali Kelas</th>
                            <td>{{ $kelasSiswa->waliKelas->nama }}</td>
                        </tr>
                        <tr>
                            <th>NBM Wali Kelas</th>
                            <td>{{ $kelasSiswa->waliKelas->nip }}</td>
                        </tr>
                        <tr>
                            <th>Daftar Siswa</th>
                            <td>
                                <a href="{{ route('kelasSiswa.daftarSiswa', $kelasSiswa->id) }}" class="btn btn-info btn-sm">
                                    Preview
                                </a>
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
                                            data-target="#editKelasSiswaModal">
                                            Ubah</button>
                                        <form action="{{ route('kelasSiswa.destroy', $kelasSiswa->id) }}" class="d-inline"
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

    @include('pages.admin.bank_data.kelas_siswa.edit')

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
