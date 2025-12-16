@extends('layout.guest.main')

@section('content-title', 'Formulir Pendaftaran')

@section('content')
    <section class="daftar" id="daftar">
        <div class="row justify-content-center">
            <div class="col-lg-10 " style="padding: 30px; margin-top:58px;">
                <div class="card"
                    style="border-radius: 15px; border-color:darkorange; background-color: rgba(255, 255, 255, 0.25); backdrop-filter:blur(15px);">
                    <div class="card-body">
                        <form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <header class="section-header">
                                <p>Data Diri</p>
                            </header>
                            <div class="row" style="padding: 0px 30px 0px 30px">
                                <div class="col-md-8 mb-4">
                                    <div class="form-outline">
                                        <label for="formlabel" class="form-label">Nama Lengkap <span
                                                style="color:red">*</span></label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control @error('nama') is-invalid @enderror nama"
                                            placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-outline">
                                        <label for="formlabel" class="form-label">No. HP Calon Siswa
                                            <small>(opsional)</small></label>
                                        <input type="text" name="nohp" id="nohp"
                                            class="form-control @error('nohp') is-invalid @enderror"
                                            oninput="nohpSiswa(this.value)" placeholder="08xxxxxx"
                                            value="{{ old('nohp') }}">
                                        @error('nohp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding: 0px 30px 0px 30px">
                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="tempatLahir" class="form-label">Tempat Lahir <span
                                                style="color:red">*</span></label>
                                        <input type="text"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror alphaonly"
                                            name="tempat_lahir" id="tempat_lahir" placeholder="Surabaya"
                                            value="{{ old('tempat_lahir') }}" required>
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="birthdayDate" class="form-label">Tanggal Lahir <span
                                                style="color:red">*</span></label>
                                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                            name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="wni" class="form-label">Gender <span
                                                style="color:red">*</span></label>
                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="radio" name="gender" value="L"
                                                checked>
                                            <label class="form-check-label" for="L">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline ml-4">
                                            <input class="form-check-input" type="radio" name="gender" value="P">
                                            <label class="form-check-label" for="P">Perempuan</label>
                                        </div>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding: 0px 30px 0px 30px">
                                <div class="col-md-8 mb-4">
                                    <div class="form-outline">
                                        <label for="formlabel" class="form-label">Alamat <span
                                                style="color:red">*</span></label>
                                        <textarea type="text-area" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                            required>{{ trim(old('alamat')) }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="tk" class="form-label">Asal Sekolah (TK) <span
                                                style="color:red">*</span></label>
                                        <select class="form-select @error('tk') is-invalid @enderror" name="tk"
                                            id="tk" required>
                                            <option selected disabled>Pilih TK</option>
                                            @foreach ($tk as $tk)
                                                <option value="{{ $tk->id }}">{{ $tk->nama }}</option>
                                            @endforeach
                                            <option value="Lainnya">Lainnya</option>
                                        </select>

                                        <input type="text" class="form-control" style="display: none"
                                            name="nama_tk_lain" id="nama_tk_lain" placeholder="Nama TK">

                                        <input class="form-control" style="display: none" list="datalistOptions"
                                            name="kota_tk_lain" id="kota_tk_lain" placeholder="Kota TK">
                                        <datalist id="datalistOptions">
                                            @foreach ($tkKota as $tkKota)
                                                <option value="{{ $tkKota->kota }}">
                                            @endforeach
                                        </datalist>
                                        @error('tk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <header class="section-header">
                                <p>Data Orangtua Siswa</p>
                            </header>

                            <div class="row" style="padding: 0px 30px 0px 30px">
                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="nama_ayah" class="form-label">Nama Ayah Kandung</label>
                                        <input type="text"
                                            class="form-control @error('nama_ayah') is-invalid @enderror nama"
                                            name="nama_ayah" id="birthdayDate" placeholder="Masukkan Nama Ayah"
                                            value="{{ old('nama_ayah') }}">
                                        @error('nama_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah Kandung</label>
                                        <select class="form-select @error('pekerjaan_ayah') is-invalid @enderror"
                                            name="pekerjaan_ayah" id="pekerjaan_ayah">
                                            <option selected disabled>Pilih pekerjaan</option>
                                            @foreach ($pekerjaanAyah as $pekerjaanAyah)
                                                <option value="{{ $pekerjaanAyah->id }}">{{ $pekerjaanAyah->judul }}
                                                </option>
                                            @endforeach
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <input type="text" class="form-control alphaonly" style="display: none"
                                            name="kerjalain_ayah" id="kerjalain_ayah" placeholder="Pekerjaan lain ayah">
                                        @error('pekerjaan_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="pendapatan_ayah" class="form-label">Pendapatan Ayah
                                            <small>(per-bulan)</small></label>
                                        <input type="text"
                                            class="form-control @error('pendapatan_ayah') is-invalid @enderror"
                                            name="pendapatan_ayah2" id="pendapatan_ayah2"
                                            oninput="pendapatanAyah(this.value)" placeholder="3.000.000"
                                            value="{{ old('pendapatan_ayah') }}">
                                        <input type="hidden" name="pendapatan_ayah" id="pendapatan_ayah" readonly>
                                        @error('pendapatan_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="nama_ibu" class="form-label">Nama Ibu Kandung</label>
                                        <input type="text"
                                            class="form-control @error('nama_ibu') is-invalid @enderror nama"
                                            name="nama_ibu" id="birthdayDate" placeholder="Masukkan Nama Ibu"
                                            value="{{ old('nama_ibu') }}">
                                        @error('nama_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu Kandung</label>
                                        <select class="form-select @error('pekerjaan_ibu') is-invalid @enderror"
                                            name="pekerjaan_ibu" id="pekerjaan_ibu">
                                            <option selected disabled>Pilih pekerjaan</option>
                                            @foreach ($pekerjaanIbu as $pekerjaanIbu)
                                                <option value="{{ $pekerjaanIbu->id }}">{{ $pekerjaanIbu->judul }}
                                                </option>
                                            @endforeach
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <input type="text" class="form-control alphaonly" style="display: none"
                                            name="kerjalain_ibu" id="kerjalain_ibu" placeholder="Pekerjaan lain ibu">
                                        @error('pekerjaan_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="pendapatan_ibu" class="form-label">Pendapatan Ibu
                                            <small>(per-bulan)</small></label>
                                        <input type="text"
                                            class="form-control @error('pendapatan_ibu') is-invalid @enderror uang"
                                            name="pendapatan_ibu2" id="pendapatan_ibu2"
                                            oninput="pendapatanIbu(this.value)" placeholder="1.000.000"
                                            value="{{ old('pendapatan_ibu') }}">
                                        <input type="hidden" name="pendapatan_ibu" id="pendapatan_ibu" readonly>
                                        @error('pendapatan_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="nama_wali" class="form-label">Nama Wali
                                            <small>(opsional)</small></label>
                                        <input type="text"
                                            class="form-control @error('nama_wali') is-invalid @enderror nama"
                                            name="nama_wali" id="nama_wali" placeholder="Masukkan Nama Wali"
                                            value="{{ old('nama_wali') }}">
                                        @error('nama_wali')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
                                        <select class="form-select @error('pekerjaan_wali') is-invalid @enderror"
                                            name="pekerjaan_wali" id="pekerjaan_wali">
                                            <option selected disabled>Pilih pekerjaan</option>
                                            @foreach ($pekerjaanWali as $pekerjaanWali)
                                                <option value="{{ $pekerjaanWali->id }}">{{ $pekerjaanWali->judul }}
                                                </option>
                                            @endforeach
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <input type="text" class="form-control alphaonly" style="display: none"
                                            name="kerjalain_wali" id="kerjalain_wali" placeholder="Pekerjaan lain wali">
                                        @error('pekerjaan_wali')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="pendapatan_wali" class="form-label">Pendapatan Wali
                                            <small>(per-bulan)</small></label>
                                        <input type="text"
                                            class="form-control @error('pendapatan_wali') is-invalid @enderror uang"
                                            name="pendapatan_wali2" id="pendapatan_wali2"
                                            oninput="pendapatanWali(this.value)" placeholder="1.000.000"
                                            value="{{ old('pendapatan_wali') }}">
                                        <input type="hidden" name="pendapatan_wali" id="pendapatan_wali" readonly>
                                        @error('pendapatan_wali')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <label for="nohp_ortu" class="form-label">No. HP Ayah/Ibu/Wali <span
                                                    style="color:red">*</span></label>
                                            <input type="text"
                                                class="form-control @error('nohp_ortu') is-invalid @enderror"
                                                name="nohp_ortu" id="nohp_ortu" oninput="nohpOrtu(this.value)"
                                                placeholder="08xxxxxx" value="{{ old('nohp_ortu') }}" required>
                                            @error('nohp_ortu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <label for="email_ortu" class="form-label">Email Ayah/Ibu/Wali</label>
                                            <input type="email"
                                                class="form-control @error('email_ortu') is-invalid @enderror"
                                                name="email_ortu" placeholder="Email Ayah/Ibu"
                                                value="{{ old('email_ortu') }}">
                                            @error('email_ortu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row" style="padding: 0px 30px 0px 30px">
                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="wni" class="form-label">Provinsi : </label>
                                        <select class="form-select form-control">
                                            <option>Provinsi</option>
                                            <option value="Jawa Timur">Jawa Timur</option>
                                            <option value="Jawa Tengah">Jawa Tengah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="wni" class="form-label">Kabupaten / Kota : </label>
                                        <select class="form-select form-control">
                                            <option>Kabupaten / Kota</option>
                                            <option value="Surabaya">Surabaya</option>
                                            <option value="Sidoarjo">Sidoarjo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="lastName">Kecamatan :</label>
                                        <input type="text" id="lastName" class="form-control"
                                            placeholder="Masukkan Kecamatan">
                                    </div>
                                </div>
                            </div> --}}
                            <hr>
                            <header class="section-header">
                                <p>Program Pendidikan</p>
                            </header>
                            <div class="row" style="padding: 0px 30px 0px 30px">
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="kategori_kelas" class="form-label">Pilihan kelas <span
                                                style="color:red">*</span></label>
                                        <select
                                            class="form-select form-control @error('kategori_kelas') is-invalid @enderror"
                                            name="kategori_kelas" required>
                                            <option selected disabled>Pilih kategori kelas</option>
                                            <option value="Reguler">Kelas Reguler</option>
                                            <option value="Billingual">Kelas Billingual</option>
                                        </select>
                                        <small>Kategori kelas yang ingin dituju</small>
                                        @error('kategori_kelas')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <label for="file" class="form-label">Bukti Pembayaran <span
                                                style="color:red">*</span></label>
                                        <input class="form-control @error('file') is-invalid @enderror" name="file"
                                            id="file" type="file" placeholder="Bukti Transfer" required>
                                        <small>Hanya untuk file pdf atau gambar max. 2 MB</small>
                                        @error('file')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding: 0px 30px 0px 30px">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success btn-block">Kirim</button>
                                </div>
                                <label for="kategori_kelas" class="form-label mt-3"><i>
                                        Catatan : "Setelah menekan tombol Kirim,
                                        mohon <strong>Konfirmasi Pembayaran</strong> Ayah Bunda"
                                    </i></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function nohpSiswa(text) {
            text = text.replace(/[^0-9]/g, '');
            var inputResult = document.getElementById('nohp');
            inputResult.value = text;
        }

        function nohpOrtu(text) {
            text = text.replace(/[^0-9]/g, '');
            var inputResult = document.getElementById('nohp_ortu');
            inputResult.value = text;
        }

        $(function() {
            $('.alphaonly').bind('keyup blur', function() {
                var text = $(this);
                text.val(text.val().replace(/[^a-zA-Z\s]+/, ''));
            });

            $('.nama').on('input', function() {
                var regex = /^[a-zA-Z' ]+$/;
                var input = $(this).val();
                if (!regex.test(input)) {
                    $(this).val(input.slice(0, -1));
                    // Removes the last character if it doesn't match the pattern
                }
            });

            // $('#username').bind('keyup blur',function(){
            //     var text = $(this);
            //     text.val(text.val().replace(/[^a-zA-Z]/g,'') ); }
            // );

            // TK Lainnya
            $('#tk').on('change', function() {
                if (this.value == 'Lainnya') {
                    $("#nama_tk_lain").show();
                    $("#kota_tk_lain").show();
                    $("#kota_tk_lain2").show();
                }
            });

            $('#pekerjaan_ayah').on('change', function() {
                if (this.value == 'Lainnya') {
                    $("#kerjalain_ayah").show();
                }
            });
            $('#pekerjaan_ibu').on('change', function() {
                if (this.value == 'Lainnya') {
                    $("#kerjalain_ibu").show();
                }
            });
            $('#pekerjaan_wali').on('change', function() {
                if (this.value == 'Lainnya') {
                    $("#kerjalain_wali").show();
                }
            });


            $("#pendapatan_ayah2").keyup(function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                $("#pendapatan_ayah").val($(this).val());
                $(this).val(format($(this).val()));
            });

            $("#pendapatan_ibu2").keyup(function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                $("#pendapatan_ibu").val($(this).val());
                $(this).val(format($(this).val()));
            });

            $("#pendapatan_wali2").keyup(function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                $("#pendapatan_wali").val($(this).val());
                $(this).val(format($(this).val()));
            });

        });

        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(",") > 0) {
                parts = str.split(",");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ".") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(".");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "," + parts[1].substr(0, 2) : ""));
        };
    </script>
@endpush
