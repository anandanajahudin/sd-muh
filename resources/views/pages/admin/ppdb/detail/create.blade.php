<!-- Modal -->
<div class="modal fade modal-icon" id="addPpdbSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPpdbSiswaModalLabel">Tambah Calon Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('ppdbSiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Lengkap Calon Siswa/Siswi" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Gender <span style="color:red">*</span></label>
                    <div class="form-check ml-4">
                        <input class="form-check-input" type="radio" name="gender" value="L" checked>
                        <label class="form-check-label" for="L">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check ml-4">
                        <input class="form-check-input" type="radio" name="gender" value="P">
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
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Surabaya" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Lahir <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                        @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">No.Handphone Siswa <small>(opsional)</small></label>
                    <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" oninput="phoneNumbers(this.value)" placeholder="085xxxx" value="{{ old('nohp') }}"/>
                    @error('nohp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="nama_ayah" placeholder="Nama Lengkap Ayah Kandung" value="{{ old('nama_ayah') }}">
                        @error('nama_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
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
                        <input type="hidden" name="pendapatan_ayah" id="pendapatan_ayah" value="{{ old('pendapatan_ayah') }}" readonly>
                        @error('pendapatan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="nama_ibu" placeholder="Nama Lengkap Ibu Kandung" value="{{ old('nama_ibu') }}">
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
                        <input type="hidden" name="pendapatan_ibu" id="pendapatan_ibu" value="{{ old('pendapatan_ibu') }}" readonly>
                        @error('pendapatan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Nama Wali <small>(opsional)</small></label>
                        <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" name="nama_wali" id="nama_wali" placeholder="Nama Lengkap Wali Murid" value="{{ old('nama_wali') }}">
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
                        <input type="hidden" name="pendapatan_wali" id="pendapatan_wali" value="{{ old('pendapatan_wali') }}" readonly>
                        @error('pendapatan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">No.Handphone Ayah/Ibu/Wali <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('nohp_ortu') is-invalid @enderror" name="nohp_ortu" id="nohp_ortu" oninput="phoneNumbersOrtu(this.value)" placeholder="085xxxx" value="{{ old('nohp_ortu') }}" required/>
                        @error('nohp_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Email Ayah/Ibu/Wali</label>
                        <input type="email" class="form-control @error('email_ortu') is-invalid @enderror" name="email_ortu" id="email_ortu" placeholder="Email Ayah/Ibu/Wali" value="{{ old('email_ortu') }}">
                        @error('email_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat <span style="color:red">*</span></label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" required></textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Asal Sekolah (TK) <span style="color:red">*</span></label>
                        <select class="form-control @error('tk') is-invalid @enderror" name="tk" id="tk" required>
                            <option selected disabled>Pilih TK</option>
                            @foreach ($tk as $tk)
                                <option value="{{ $tk->id }}">{{ $tk->nama }}</option>
                            @endforeach
                        </select>
                        @error('tk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Kategori <span style="color:red">*</span></label>
                        <select class="form-control @error('kategori_kelas') is-invalid @enderror" name="kategori_kelas" id="kategori_kelas" required>
                            <option selected disabled>Pilih kategori kelas</option>
                            <option value="Reguler">Reguler</option>
                            <option value="Billingual">Billingual</option>
                        </select>
                        @error('kategori_kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Bukti Pembayaran <span style="color:red">*</span></label>
                    <input class="form-control @error('file') is-invalid @enderror" name="file" id="file" type="file" placeholder="Bukti Pembayaran (Transfer)" required>
                    <small>Hanya untuk file pdf atau gambar max. 2 MB</small>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" class="form-control @error('id_ppdb') is-invalid @enderror" name="id_ppdb" id="id_ppdb" value="{{ $id_ppdb }}" required readonly>
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

    $(function() {
        $('.alphaonly').bind('keyup blur',function(){
            var text = $(this);
            text.val(text.val().replace(/[^a-zA-Z\s]+/g,'') ); }
        );

        // $('#username').bind('keyup blur',function(){
        //     var text = $(this);
        //     text.val(text.val().replace(/[^a-zA-Z]/g,'') ); }
        // );

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
