<!-- Modal -->
<div class="modal fade modal-icon" id="editSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSiswaModalLabel">Edit Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">PPDB</label>
                    <input type="text" class="form-control" name="id_ppdb" id="id_ppdb" value="PPDB {{ $siswa->ppdbSiswa->ppdb->tahun_ajaran }}" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Asal Sekolah (TK) <span style="color:red">*</span></label>
                        <select class="form-control @error('tk') is-invalid @enderror" name="tk" id="tk" required>
                            @if ($siswa->ppdbSiswa->tk == null)
                                <option selected disabled>Pilih TK</option>
                            @else
                                <option value="{{ $siswa->ppdbSiswa->tk }}" selected>{{ $siswa->ppdbSiswa->tkSiswa->nama }}</option>
                            @endif
                            @foreach ($tk as $tk)
                                <option value="{{ $tk->id }}">{{ $tk->nama }}</option>
                            @endforeach
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <input type="text" class="form-control" style="display: none" name="nama_tk_lain" id="nama_tk_lain" placeholder="Nama TK">
                        <select class="form-control" style="display: none" name="kota_tk_lain" id="kota_tk_lain">
                            <option selected disabled>Pilih kota TK</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Sidoarjo">Sidoarjo</option>
                            <option value="Malang">Malang</option>
                        </select>
                        @error('tk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Mutasi dari SD <small>(khusus siswa mutasi)</small></label>
                        <select class="form-control @error('id_mutasi') is-invalid @enderror" name="id_mutasi" id="id_mutasi">
                            @if ($siswa->id_mutasi == null)
                                <option selected disabled>Pilih Mutasi SD</option>
                            @else
                                <option value="{{ $siswa->id_mutasi }}" selected>{{ $siswa->mutasi->nama }}</option>
                            @endif
                            @foreach ($sdMutasi as $sdMutasi)
                                <option value="{{ $sdMutasi->id }}">{{ $sdMutasi->nama }}</option>
                            @endforeach
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <input type="text" class="form-control" style="display: none" name="nama_sd_lain" id="nama_sd_lain" placeholder="Nama SD">
                        <select class="form-control" style="display: none" name="kota_sd_lain" id="kota_sd_lain">
                            <option selected disabled>Pilih kota SD</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Sidoarjo">Sidoarjo</option>
                            <option value="Malang">Malang</option>
                        </select>
                        @error('id_sd_mutasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span style="color:red">*</span></label>
                    <input type="text" class="form-control alphaonly @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $siswa->ppdbSiswa->nama }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Kelas <span style="color:red">*</span></label>
                        <select class="form-control @error('id_kelas_siswa') is-invalid @enderror" name="id_kelas_siswa" id="id_kelas_siswa" required>
                            @if ($siswa->id_kelas_siswa == null)
                                <option selected disabled>Pilih kelas</option>
                            @else
                                <option value="{{ $siswa->id_kelas_siswa }}" selected>
                                    Kelas {{ $siswa->kelasSiswa->namaKelas->nama_kelas. ' ('.$siswa->kelasSiswa->tahun_ajaran.')' }}
                                </option>
                            @endif
                            @foreach ($kelasSiswa as $kelasSiswa)
                                <option value="{{ $kelasSiswa->id }}">Kelas {{ $kelasSiswa->namaKelas->nama_kelas. ' ('.$kelasSiswa->tahun_ajaran.')' }}</option>
                            @endforeach
                        </select>
                        @error('id_kelas_siswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Penerimaan Siswa</label>
                        <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" placeholder="Tanggal Penerimaan Siswa" name="tgl_masuk" id="tgl_masuk" value="{{ $siswa->tgl_masuk }}">
                        @error('tgl_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" id="nis" oninput="nisNumbers(this.value)" placeholder="19xxxxxx" value="{{ $siswa->nis }}">
                        @error('nis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">NISN</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" oninput="nisnNumbers(this.value)" placeholder="35xxxxxxx" value="{{ $siswa->nisn }}">
                        @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Gender <span style="color:red">*</span></label>
                    <div class="form-check ml-3">
                        @if ($siswa->ppdbSiswa->gender == 'L')
                            <input class="form-check-input" type="radio" name="gender" value="L" checked>
                        @else
                            <input class="form-check-input" type="radio" name="gender" value="L">
                        @endif
                        <label class="form-check-label" for="L">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        @if ($siswa->ppdbSiswa->gender == 'P')
                            <input class="form-check-input" type="radio" name="gender" value="P" checked>
                        @else
                            <input class="form-check-input" type="radio" name="gender" value="P">
                        @endif
                        <label class="form-check-label" for="P">
                            Perempuan
                        </label>
                    </div>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Tempat Lahir <span style="color:red">*</span></label>
                        <input type="text" class="form-control alphaonly @error('tempat_lahir') is-invalid @enderror" placeholder="Surabaya" name="tempat_lahir" id="tempat_lahir" value="{{ $siswa->ppdbSiswa->tempat_lahir }}" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Lahir <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" name="tgl_lahir" id="tgl_lahir" value="{{ $siswa->ppdbSiswa->tgl_lahir }}" required>
                        @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">No.Handphone Siswa <small>(opsional)</small></label>
                    <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" oninput="phoneNumbers(this.value)" placeholder="085xxxx" value="{{ $siswa->ppdbSiswa->nohp }}"/>
                    @error('nohp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control alphaonly @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="nama_ayah" placeholder="Nama Lengkap Ayah" value="{{ $siswa->ppdbSiswa->nama_ayah }}">
                        @error('nama_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div><div class="form-group col-md-4">
                        <label class="form-label">Pekerjaan Ayah</label>
                        <select class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" id="pekerjaan_ayah">
                            <option selected disabled>Pilih pekerjaan</option>
                            @foreach ($listPekerjaanAyah as $listPekerjaanAyah)
                                <option value="{{ $listPekerjaanAyah->id }}">{{ $listPekerjaanAyah->judul }}</option>
                            @endforeach
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <input type="text" class="form-control alphaonly" style="display: none" name="kerjalain_ayah" id="kerjalain_ayah" placeholder="Pekerjaan lain ayah">
                        @error('pekerjaan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Pendapatan Ayah</label>
                        <input type="text" class="form-control @error('pendapatan_ayah') is-invalid @enderror uang" name="pendapatan_ayah2" id="pendapatan_ayah2"
                            placeholder="1.000.000" value="{{ old('pendapatan_ayah') }}">
                        <input type="hidden" name="pendapatan_ayah" id="pendapatan_ayah" readonly>
                        @error('pendapatan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control alphaonly @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="nama_ibu" placeholder="Nama Lengkap Ibu" value="{{ $siswa->ppdbSiswa->nama_ibu }}">
                        @error('nama_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Pekerjaan Ibu</label>
                        <select class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" id="pekerjaan_ibu">
                            <option selected disabled>Pilih pekerjaan</option>
                            @foreach ($listPekerjaanIbu as $listPekerjaanIbu)
                                <option value="{{ $listPekerjaanIbu->id }}">{{ $listPekerjaanIbu->judul }}</option>
                            @endforeach
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <input type="text" class="form-control alphaonly" style="display: none" name="kerjalain_ibu" id="kerjalain_ibu" placeholder="Pekerjaan lain ibu">
                        @error('pekerjaan_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Pendapatan Ibu</label>
                        <input type="text" class="form-control @error('pendapatan_ibu') is-invalid @enderror uang" name="pendapatan_ibu2" id="pendapatan_ibu2"
                            placeholder="1.000.000" value="{{ old('pendapatan_ibu') }}">
                        <input type="hidden" name="pendapatan_ibu" id="pendapatan_ibu" readonly>
                        @error('pendapatan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Nama Wali <small>(opsional)</small></label>
                        <input type="text" class="form-control alphaonly @error('nama_wali') is-invalid @enderror" name="nama_wali" id="nama_wali" placeholder="Nama Lengkap Wali Murid" value="{{ $siswa->ppdbSiswa->nama_wali }}">
                        @error('nama_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Pekerjaan Wali</label>
                        <select class="form-control @error('pekerjaan_wali') is-invalid @enderror" name="pekerjaan_wali" id="pekerjaan_wali">
                            <option selected disabled>Pilih pekerjaan</option>
                            @foreach ($listPekerjaanWali as $listPekerjaanWali)
                                <option value="{{ $listPekerjaanWali->id }}">{{ $listPekerjaanWali->judul }}</option>
                            @endforeach
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <input type="text" class="form-control alphaonly" style="display: none" name="kerjalain_wali" id="kerjalain_wali" placeholder="Pekerjaan lain wali">
                        @error('pekerjaan_wali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Pendapatan Wali</label>
                        <input type="text" class="form-control @error('pendapatan_wali') is-invalid @enderror uang" name="pendapatan_wali2" id="pendapatan_wali2"
                            placeholder="1.000.000" value="{{ old('pendapatan_wali') }}">
                        <input type="hidden" name="pendapatan_wali" id="pendapatan_wali" readonly>
                        @error('pendapatan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">No.Handphone Ayah/Ibu/Wali <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('nohp_ortu') is-invalid @enderror" name="nohp_ortu" id="nohp_ortu" oninput="phoneNumbersOrtu(this.value)" placeholder="085xxxx" value="{{ $siswa->ppdbSiswa->nohp_ortu }}" required/>
                        @error('nohp_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Email Ayah/Ibu/Wali</label>
                        <input type="email" class="form-control @error('email_ortu') is-invalid @enderror" name="email_ortu" id="email_ortu" placeholder="Email Ayah/Ibu/Wali" value="{{ $siswa->ppdbSiswa->email_ortu }}">
                        @error('email_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat <span style="color:red">*</span></label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" required>{{ trim($siswa->ppdbSiswa->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Username Siswa <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="muhammadandi20" value="{{ $siswa->userSiswa->name }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Email Siswa<span style="color:red">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Siswa" value="{{ $siswa->userSiswa->email }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>

@push('scripts')
<script>
    function phoneNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('nohp');
        inputResult.value = text;
    }
    function phoneNumbersOrtu(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('nohp_ortu');
        inputResult.value = text;
    }
    function nisNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('nis');
        inputResult.value = text;
    }
    function nisnNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('nisn');
        inputResult.value = text;
    }
    $(function() {

        $('.alphaonly').bind('keyup blur',function(){
            var text = $(this);
            text.val(text.val().replace(/[^a-zA-Z\s]+/,'') ); }
        );

        // TK Lainnya
        $('#tk').on('change', function() {
            if (this.value == 'Lainnya') {
                $("#nama_tk_lain").show();
                $("#kota_tk_lain").show();
            }
        });

        // SD Lainnya
        $('#id_mutasi').on('change', function() {
            if (this.value == 'Lainnya') {
                $("#nama_sd_lain").show();
                $("#kota_sd_lain").show();
            }
        });

        // Pekerjaan Lainnya
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

        // Pendapatan
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

    var format = function(num){
      var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
      if(str.indexOf(",") > 0) {
        parts = str.split(",");
        str = parts[0];
      }
      str = str.split("").reverse();
      for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ".") {
          output.push(str[j]);
          if(i%3 == 0 && j < (len - 1)) {
            output.push(".");
          }
          i++;
        }
      }
      formatted = output.reverse().join("");
      return("" + formatted + ((parts) ? "," + parts[1].substr(0, 2) : ""));
    };
</script>
@endpush
