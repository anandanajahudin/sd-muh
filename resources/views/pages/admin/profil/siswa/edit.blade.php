<!-- Modal -->
<div class="modal fade modal-icon" id="editSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSiswaModalLabel">Edit Profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('profilku.updateProfilSiswa', $dataProfil->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $dataProfil->nama }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">NIS <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" id="nis" oninput="nisNumbers(this.value)" placeholder="19xxxxxx" value="{{ $dataProfil->nis }}" required>
                    @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">NISN <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" oninput="nisnNumbers(this.value)" placeholder="35xxxxxxx" value="{{ $dataProfil->nisn }}" required>
                    @error('nisn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Gender <span style="color:red">*</span></label>
                    <div class="form-check ml-3">
                        @if ($dataProfil->gender == 'L')
                            <input class="form-check-input" type="radio" name="gender" value="L" checked>
                        @else
                            <input class="form-check-input" type="radio" name="gender" value="L">
                        @endif
                        <label class="form-check-label" for="L">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        @if ($dataProfil->gender == 'P')
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
                <div class="form-group">
                    <label class="form-label">No.Handphone Siswa <small>(opsional)</small></label>
                    <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" oninput="phoneNumbers(this.value)" placeholder="085xxxx" value="{{ $dataProfil->nohp }}"/>
                    @error('nohp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">No.Handphone Ayah/Ibu <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nohp_ortu') is-invalid @enderror" name="nohp_ortu" id="nohp_ortu" oninput="phoneNumbersOrtu(this.value)" placeholder="085xxxx" value="{{ $dataProfil->nohp_ortu }}" required/>
                    @error('nohp_ortu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email Ayah/Ibu <span style="color:red">*</span></label>
                    <input type="email" class="form-control @error('email_ortu') is-invalid @enderror" name="email_ortu" id="email_ortu" placeholder="ahmadjoko90@gmail.com" value="{{ $dataProfil->email_ortu }}" required>
                    @error('email_ortu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Ayah <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="nama_ayah" placeholder="Nama Lengkap Ayah" value="{{ $dataProfil->nama_ayah }}" required>
                    @error('nama_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Ibu <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="nama_ibu" placeholder="Nama Lengkap Ibu" value="{{ $dataProfil->nama_ibu }}" required>
                    @error('nama_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Wali <small>(opsional)</small></label>
                    <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" name="nama_wali" id="nama_wali" placeholder="Nama Lengkap Wali Murid" value="{{ $dataProfil->nama_wali }}">
                    @error('nama_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat <span style="color:red">*</span></label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" required>{{ trim($dataProfil->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Sifat Siswa<span style="color:red">*</span></label>
                    <select class="form-control @error('sifat') is-invalid @enderror" name="sifat" id="sifat" required>
                        @if ($dataProfil->sifat == 'periang')
                            <option selected value="{{ $dataProfil->sifat }}">Periang</option>
                            <option value="pendiam">Pendiam</option>
                        @else
                            <option selected value="{{ $dataProfil->sifat }}">Pendiam</option>
                            <option value="periang">Periang</option>
                        @endif
                    </select>
                    @error('sifat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>

<script>
    function phoneNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('no_hp');
        inputResult.value = text;
    }
    function nikNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('nik');
        inputResult.value = text;
    }
    function nipNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('nip');
        inputResult.value = text;
    }
</script>
