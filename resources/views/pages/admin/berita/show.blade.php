@extends('layout.admin.main')

@if ($berita->jenis == 'agenda')
    @section('title', 'Data Agenda | SekolahKarakter24')
@elseif ($berita->jenis == 'berita')
    @section('title', 'Data Berita | SekolahKarakter24')
@elseif ($berita->jenis == 'opini')
    @section('title', 'Data Opini | SekolahKarakter24')
@else
    @section('title', 'Data Berita TV | SekolahKarakter24')
@endif

@section('sidebar')
    @include('layout.admin.partials.sidebar.beritaShow')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            @if ($berita->jenis == 'agenda')
                <h5>Data Agenda</h5>
            @elseif ($berita->jenis == 'berita')
                <h5>Data Berita</h5>
            @elseif ($berita->jenis == 'opini')
                <h5>Data Opini</h5>
            @else
                <h5>Data Berita TV</h5>
            @endif
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Judul Berita</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $berita->judul }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Slug</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ $berita->slug }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Tanggal Dibuat</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ date('d M Y', strtotime($berita->created_at)) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Jenis</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {{ ucfirst($berita->jenis) }}
                        </div>
                    </div>

                    @if ($berita->jenis == 'agenda')
                        <div class="form-group row">
                            <label class="col-lg-3 col-xl-3 col-form-label"><b>Tanggal Agenda</b></label>
                            <div class="col-lg-9 col-xl-9 col-form-label">
                                {{ date('d M Y', strtotime($berita->tgl_agenda)) }}
                            </div>
                        </div>
                    @elseif ($berita->jenis == 'tv')
                        <div class="form-group row">
                            <label class="col-lg-3 col-xl-3 col-form-label"><b>Link Vidio (Youtube)</b></label>
                            <div class="col-lg-9 col-xl-9 col-form-label">
                                <a href="https://www.youtube.com/watch?v={{ $berita->link_vidio }}"
                                    target="_blank">{{ $berita->link_vidio }}</a>
                            </div>
                        </div>
                    @else
                    @endif
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Deskripsi</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            {!! $berita->deskripsi !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Gambar</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">
                            @if ($berita->gambar != null)
                                @if ($berita->jenis == 'agenda')
                                    @if (file_exists('repo/berita/dataAgenda/' . $berita->id . '/' . $berita->gambar))
                                        <a href="{{ asset('repo/berita/dataAgenda/' . $berita->id . '/' . $berita->gambar) }}"
                                            class="btn btn-info btn-sm" target="_blank">
                                            Preview
                                        </a>
                                    @else
                                    @endif
                                @elseif ($berita->jenis == 'berita')
                                    @if (file_exists('repo/berita/dataBerita/' . $berita->id . '/' . $berita->gambar))
                                        <a href="{{ asset('repo/berita/dataBerita/' . $berita->id . '/' . $berita->gambar) }}"
                                            class="btn btn-info btn-sm" target="_blank">
                                            Preview
                                        </a>
                                    @else
                                    @endif
                                @elseif ($berita->jenis == 'opini')
                                    @if (file_exists('repo/berita/dataOpini/' . $berita->id . '/' . $berita->gambar))
                                        <a href="{{ asset('repo/berita/dataOpini/' . $berita->id . '/' . $berita->gambar) }}"
                                            class="btn btn-info btn-sm" target="_blank">
                                            Preview
                                        </a>
                                    @else
                                    @endif
                                @else
                                    @if (file_exists('repo/berita/dataTv/' . $berita->id . '/' . $berita->gambar))
                                        <a href="{{ asset('repo/berita/dataTv/' . $berita->id . '/' . $berita->gambar) }}"
                                            class="btn btn-info btn-sm" target="_blank">
                                            Preview
                                        </a>
                                    @else
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Keterangan Gambar</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">{{ $berita->keterangan_img }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-xl-3 col-form-label"><b>Dibuat oleh</b></label>
                        <div class="col-lg-9 col-xl-9 col-form-label">{{ $berita->userPost->name }}</div>
                    </div>

                    {{-- berita-buttons --}}
                    @include('pages.admin.berita.berita-buttons')
                </div>
            </div>
        </div>
    </div>
    <!-- Basic table card end -->

    @include('pages.admin.berita.editGambar')
    @include('pages.admin.berita.edit')

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
