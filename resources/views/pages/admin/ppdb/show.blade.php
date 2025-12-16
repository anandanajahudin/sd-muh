@extends('layout.admin.main')

@section('title', 'Data Calon Siswa | SekolahKarakter24')

@section('sidebar')
    @include('layout.admin.partials.sidebar.bank')
@endsection

@section('content')
    <!-- Basic table card start -->
    <div class="card">
        <div class="card-header">
            <h5>Data Calon Siswa</h5>
        </div>

        <div class="card-block">

            <div class="row">
                <div class="col-lg-8 col-xl-6">
                    <table class="table">
                        <tr>
                            <th>PPDB</th>
                            <td>{{ $ppdbSiswa->ppdb->tahun_ajaran }}</td>
                        </tr>
                        <tr>
                            <th>Kategori Kelas</th>
                            <td>{{ $ppdbSiswa->kategori_kelas }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $ppdbSiswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>
                                @if ($ppdbSiswa->gender == 'L')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td>
                                @if ($ppdbSiswa->tempat_lahir != null && $ppdbSiswa->tgl_lahir != null)
                                    {{ $ppdbSiswa->tempat_lahir . ', ' . date('d M Y', strtotime($ppdbSiswa->tgl_lahir)) }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>No.Handphone Siswa</th>
                            <td>{{ $ppdbSiswa->nohp }}</td>
                        </tr>
                        <tr>
                            <th>No.Handphone Ayah/Ibu</th>
                            <td>{{ $ppdbSiswa->nohp_ortu }}</td>
                        </tr>
                        <tr>
                            <th>Email Ayah/Ibu</th>
                            <td>{{ $ppdbSiswa->email_ortu }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ayah</th>
                            <td>{{ $ppdbSiswa->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ayah</th>
                            <td>
                                @if ($ppdbSiswa->pekerjaan_ayah != null)
                                    {{ App\Models\Pekerjaan::where('id', $ppdbSiswa->pekerjaan_ayah)->first()->judul }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pendapatan Ayah</th>
                            <td>@currency($ppdbSiswa->pendapatan_ayah)</td>
                        </tr>
                        <tr>
                            <th>Nama Ibu</th>
                            <td>{{ $ppdbSiswa->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ibu</th>
                            <td>
                                @if ($ppdbSiswa->pekerjaan_ayah != null)
                                    {{ App\Models\Pekerjaan::where('id', $ppdbSiswa->pekerjaan_ibu)->first()->judul }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pendapatan Ibu</th>
                            <td>@currency($ppdbSiswa->pendapatan_ibu)</td>
                        </tr>
                        <tr>
                            <th>Nama Wali</th>
                            <td>{{ $ppdbSiswa->nama_wali }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Wali</th>
                            <td>
                                @if ($ppdbSiswa->pekerjaan_wali != null)
                                    {{ App\Models\Pekerjaan::where('id', $ppdbSiswa->pekerjaan_wali)->first()->judul }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pendapatan Wali</th>
                            <td>@currency($ppdbSiswa->pendapatan_wali)</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $ppdbSiswa->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Asal Sekolah (TK)</th>
                            <td>{{ $ppdbSiswa->tkSiswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>Bukti Pembayaran PPDB</th>
                            <td>
                                @if ($ppdbSiswa->file != null)
                                    @if (file_exists('repo/ppdb/' . $ppdbSiswa->ppdb->tahun . '/' . $ppdbSiswa->kategori_kelas . '/' . $ppdbSiswa->file))
                                        <a href="{{ asset('repo/ppdb/' . $ppdbSiswa->ppdb->tahun . '/' . $ppdbSiswa->kategori_kelas . '/' . $ppdbSiswa->file) }}"
                                            class="btn btn-info btn-sm" target="_blank">
                                            Lunas
                                        </a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status Pendaftaran</th>
                            <td>
                                @if ($ppdbSiswa->status == 0)
                                    <label class="label label-warning">Menunggu</label>
                                @else
                                    <label class="label label-primary">Diterima</label>
                                    <a href="{{ route('kelasSiswa.daftarSiswa', $ppdbSiswa->siswa->id_kelas_siswa) }}"
                                        class="btn btn-info btn-sm">
                                        Lihat Kelas
                                    </a>
                                @endif
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
                                        @if ($ppdbSiswa->file == null)
                                            @if (file_exists('repo/ppdb/' . $ppdbSiswa->ppdb->tahun . '/' . $ppdbSiswa->kategori_kelas . '/' . $ppdbSiswa->file))
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#addPembayaranModal">
                                                    Upload Pembayaran</button>
                                            @else
                                                @if ($ppdbSiswa->status == 0)
                                                    @if ($ppdbSiswa->file != null)
                                                        @if (file_exists('repo/ppdb/' . $ppdbSiswa->ppdb->tahun . '/' . $ppdbSiswa->kategori_kelas . '/' . $ppdbSiswa->file))
                                                            <button type="button" class="btn btn-sm btn-success"
                                                                data-toggle="modal"
                                                                data-target="#diterimaModal">Diterima</button>
                                                        @endif
                                                    @endif
                                                @else
                                                @endif
                                            @endif
                                        @else
                                            @if (file_exists('repo/ppdb/' . $ppdbSiswa->ppdb->tahun . '/' . $ppdbSiswa->kategori_kelas . '/' . $ppdbSiswa->file))
                                                @if ($ppdbSiswa->status == 0)
                                                    @if ($ppdbSiswa->file != null)
                                                        @if (file_exists('repo/ppdb/' . $ppdbSiswa->ppdb->tahun . '/' . $ppdbSiswa->kategori_kelas . '/' . $ppdbSiswa->file))
                                                            <button type="button" class="btn btn-sm btn-success"
                                                                data-toggle="modal"
                                                                data-target="#diterimaModal">Diterima</button>
                                                        @endif
                                                    @endif
                                                @else
                                                @endif
                                            @else
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#addPembayaranModal">
                                                    Upload Pembayaran</button>
                                            @endif
                                        @endif

                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editPpdbSiswaModal">
                                            Ubah</button>

                                        <form action="{{ route('ppdbSiswa.destroy', $ppdbSiswa->id) }}" class="d-inline"
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

    @include('pages.admin.ppdb.edit')
    @include('pages.admin.ppdb.uploadPembayaran')
    @include('pages.admin.ppdb.diterima')

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
