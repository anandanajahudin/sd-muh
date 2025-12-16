@extends('layout.admin.main')

@section('title', 'Data Siswa | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Siswa</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-5">
                    <table class="table">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $siswa->ppdbSiswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>{{ $siswa->kelasSiswa->namaKelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <th>Kategori Kelas</th>
                            <td>{{ $siswa->ppdbSiswa->kategori_kelas }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Penerimaan</th>
                            <td>
                                @if ($siswa->tgl_masuk != null)
                                    {{ date('d M Y', strtotime($siswa->tgl_masuk)) }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Asal Sekolah (TK)</th>
                            <td>
                                @if ($siswa->ppdbSiswa->tk != null)
                                    {{ $siswa->ppdbSiswa->tkSiswa->nama }}
                                @else
                                @endif
                            </td>
                        </tr>
                        @if ($siswa->id_mutasi != null)
                            <tr>
                                <th>Mutasi dari SD</th>
                                <td>{{ $siswa->mutasi->nama }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Prestasi</th>
                            <td>
                                <a href="{{ route('siswa.daftarPrestasi', $siswa->id) }}" class="btn btn-success btn-sm">
                                    Lihat Prestasi
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>NIS</th>
                            <td>{{ $siswa->nis }}</td>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <td>{{ $siswa->nisn }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>
                                @if ($siswa->ppdbSiswa->gender == 'L')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td>
                                @if ($siswa->ppdbSiswa->tempat_lahir != null && $siswa->ppdbSiswa->tgl_lahir != null)
                                    {{ $siswa->ppdbSiswa->tempat_lahir . ', ' . date('d M Y', strtotime($siswa->ppdbSiswa->tgl_lahir)) }}
                                @else
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>No.Handphone Siswa</th>
                            <td>{{ $siswa->ppdbSiswa->nohp }}</td>
                        </tr>
                        <tr>
                            <th>No.Handphone Ayah/Ibu</th>
                            <td>{{ $siswa->ppdbSiswa->nohp_ortu }}</td>
                        </tr>
                        <tr>
                            <th>Email Ayah/Ibu</th>
                            <td>{{ $siswa->ppdbSiswa->email_ortu }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ayah</th>
                            <td>{{ $siswa->ppdbSiswa->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ayah</th>
                            <td>
                                @if ($siswa->ppdbSiswa->pekerjaan_ayah != null)
                                    {{ App\Models\Pekerjaan::where('id', $siswa->ppdbSiswa->pekerjaan_ayah)->first()->judul }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pendapatan Ayah</th>
                            <td>@currency($siswa->ppdbSiswa->pendapatan_ayah)</td>
                        </tr>
                        <tr>
                            <th>Nama Ibu</th>
                            <td>{{ $siswa->ppdbSiswa->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ibu</th>
                            <td>
                                @if ($siswa->ppdbSiswa->pekerjaan_ibu != null)
                                    {{ App\Models\Pekerjaan::where('id', $siswa->ppdbSiswa->pekerjaan_ibu)->first()->judul }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pendapatan Ibu</th>
                            <td>@currency($siswa->ppdbSiswa->pendapatan_ibu)</td>
                        </tr>
                        <tr>
                            <th>Nama Wali</th>
                            <td>{{ $siswa->ppdbSiswa->nama_wali }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Wali</th>
                            <td>
                                @if ($siswa->ppdbSiswa->pekerjaan_wali != null)
                                    {{ App\Models\Pekerjaan::where('id', $siswa->ppdbSiswa->pekerjaan_wali)->first()->judul }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pendapatan Wali</th>
                            <td>@currency($siswa->ppdbSiswa->pendapatan_wali)</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $siswa->ppdbSiswa->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                @if ($siswa->foto != null)
                                    @if (file_exists('storage/siswa/' . $siswa->id . '/' . $siswa->foto))
                                        <a href="{{ asset('storage/siswa/' . $siswa->id . '/' . $siswa->foto) }}"
                                            class="btn btn-info btn-sm" target="_blank">
                                            Preview
                                        </a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Username Siswa</th>
                            <td>{{ $siswa->userSiswa->name }}</td>
                        </tr>
                        <tr>
                            <th>Email Siswa</th>
                            <td>{{ $siswa->userSiswa->email }}</td>
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

                                        @if ($siswa->foto != null)
                                            @if (file_exists('storage/siswa/' . $siswa->id . '/' . $siswa->foto))
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
                                            data-target="#editSiswaModal">Ubah Data</button>

                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editPasswordModal">Ubah Password</button>

                                        <form action="{{ route('siswa.destroy', $siswa->id) }}" class="d-inline"
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

    @include('pages.admin.bank_data.siswa.uploadFoto')
    @include('pages.admin.bank_data.siswa.editPassword')

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
