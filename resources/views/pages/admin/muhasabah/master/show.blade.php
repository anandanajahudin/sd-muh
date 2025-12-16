@extends('layout.admin.main')

@section('title', 'Master Muhasabah | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.muhasabah')
@endsection

@section('content')
<!-- Basic table card start -->
<div class="card">
    <div class="card-header">
        <h5>Master Muhasabah</h5>
    </div>

    <div class="card-block">

        <div class="row">
            <div class="col-lg-8 col-xl-5">
                <table class="table">
                    <tr>
                        <th>Judul Amalan</th>
                        <td>{{ $master_muhasabah->judul }}</td>
                    </tr>
                    <tr>
                        <th>Poin Amalan</th>
                        <td>{{ $master_muhasabah->poin }}</td>
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
                                <form action="{{ route('master_muhasabah.destroy', $master_muhasabah->id) }}" class="d-inline" method="POST">
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

@include('pages.admin.muhasabah.master.edit')

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
