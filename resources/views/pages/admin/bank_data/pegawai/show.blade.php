@extends('layout.admin.main')

@section('title', 'Data Pegawai | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Pegawai</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-5">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $pegawai->nama }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Penerimaan</th>
                            <td>
                                @if ($pegawai->tgl_masuk != null)
                                    {{ date('d M Y', strtotime($pegawai->tgl_masuk)) }}
                            </td>
                            @endif
                        </tr>
                        <tr>
                            <th>NBM (Nomor Bantuan Muhammadiyah)</th>
                            <td>{{ $pegawai->nip }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $pegawai->nik }}</td>
                        </tr>
                        <tr>
                            <th>Wali Kelas</th>
                            <td>
                                @if ($kelasSiswa == null)
                                    <table>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>Tahun Ajaran</th>
                                        </tr>
                                        @foreach ($kelasSiswa as $kelas)
                                            <tr>
                                                <td>{{ $kelas->namaKelas->nama_kelas }}</td>
                                                <td>{{ $kelas->tahun_ajaran }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>
                                @if ($pegawai->gender == 'L')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td>
                                @if ($pegawai->tempat_lahir != null && $pegawai->tgl_lahir != null)
                                    {{ $pegawai->tempat_lahir . ', ' . date('d M Y', strtotime($pegawai->tgl_lahir)) }}
                                @else
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>No.Handphone/Whatsapp</th>
                            <td>{{ $pegawai->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $pegawai->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Foto KTP</th>
                            <td>
                                @if ($pegawai->foto_ktp != null)
                                    @if (file_exists('storage/pegawai/' . $pegawai->id . '/' . $pegawai->foto_ktp))
                                        <a href="{{ asset('storage/pegawai/' . $pegawai->id . '/' . $pegawai->foto_ktp) }}"
                                            class="btn btn-info btn-sm" target="_blank">
                                            Preview
                                        </a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                @if ($pegawai->foto != null)
                                    @if (file_exists('storage/pegawai/' . $pegawai->id . '/' . $pegawai->foto))
                                        <a href="{{ asset('storage/pegawai/' . $pegawai->id . '/' . $pegawai->foto) }}"
                                            class="btn btn-info btn-sm" target="_blank">
                                            Preview
                                        </a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ $pegawai->userPegawai->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $pegawai->userPegawai->email }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Pegawai</th>
                            <td>{{ ucfirst($pegawai->userPegawai->jenis) }}</td>
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

                                        @if ($pegawai->foto_ktp != null)
                                            @if (file_exists('storage/pegawai/' . $pegawai->id . '/' . $pegawai->foto_ktp))
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#addFotoKtpModal">Ganti Foto KTP</button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#addFotoKtpModal">Upload Foto KTP</button>
                                            @endif
                                        @else
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#addFotoKtpModal">Upload Foto KTP</button>
                                        @endif

                                        @if ($pegawai->foto != null)
                                            @if (file_exists('storage/pegawai/' . $pegawai->id . '/' . $pegawai->foto))
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#addFotoModal">Ganti Foto</button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#addFotoModal">Upload Foto</button>
                                            @endif
                                        @else
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#addFotoModal">Upload Foto</button>
                                        @endif

                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editPegawaiModal">Ubah Data</button>

                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editPasswordModal">Ubah Password</button>

                                        <form action="{{ route('pegawai.destroy', $pegawai->id) }}" class="d-inline"
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

    @include('pages.admin.bank_data.pegawai.uploadFoto')
    @include('pages.admin.bank_data.pegawai.uploadFotoKtp')
    @include('pages.admin.bank_data.pegawai.edit')
    @include('pages.admin.bank_data.pegawai.editPassword')

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
