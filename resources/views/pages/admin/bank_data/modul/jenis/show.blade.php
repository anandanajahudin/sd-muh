@extends('layout.admin.main')

@section('title', 'Data Jenis Modul | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Jenis Modul</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <table class="table">
                        <tr>
                            <th>Judul</th>
                            <td>{{ $jenisModul->judul }}</td>
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
                                            data-target="#editJenisModulModal">
                                            Ubah</button>

                                        <form action="{{ route('jenisModul.destroy', $jenisModul->id) }}" class="d-inline"
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

    @include('pages.admin.bank_data.modul.jenis.edit')

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
