@extends('layout.admin.main')

@section('title', 'Muhasabah | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.muhasabah')
@endsection

@section('content')
<!-- Basic table card start -->
<div class="card">
    <div class="card-header">
        <h5>Muhasabah</h5>
    </div>

    <div class="card-block">
        @php
            use App\Models\User;
            $jenisUser = User::where('id', $muhasabah->id_user)->first()->jenis;
        @endphp
        <div class="row">
            <div class="col-lg-8 col-xl-5">
                <table class="table">
                    <tr>
                        <th>Tanggal Muhasabah</th>
                        <td>{{ date('d M Y', strtotime($muhasabah->tgl_muhasabah)) }}</td>
                    </tr>
                    <tr>
                        <th>Siswa/Guru</th>
                        <td>
                            @if ($jenisUser == 'siswa')
                                {{ $muhasabah->userMuhasabah->siswa->nama }}
                            @else
                                {{ $muhasabah->userMuhasabah->pegawai->nama }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Judul Amalan</th>
                        <td>{{ $muhasabah->masterMuhasabah->judul }}</td>
                    </tr>
                    <tr>
                        <th>Poin</th>
                        <td>{{ $muhasabah->masterMuhasabah->poin }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if ($muhasabah->status != 0)
                                <label class="badge badge-success">Dikerjakan</label>
                            @else
                                <label class="badge badge-danger">Belum Dikerjakan</label>
                            @endif
                        </td>
                    </tr>
                    <tfoot>
                        <tr>
                            <th colspan="2">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="button" class="btn btn-sm btn-warning"
                                        data-toggle="modal" data-target="#editMuhasabahModal">
                                    Ubah</button>
                                <form action="{{ route('muhasabah.destroy', $muhasabah->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="deleteFunction()">Hapus</button>
                                </form>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Basic table card end -->

@if ($jenisUser == 'siswa')
    @include('pages.admin.muhasabah.siswa.edit')
@else
    @include('pages.admin.muhasabah.pegawai.edit')
@endif

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
