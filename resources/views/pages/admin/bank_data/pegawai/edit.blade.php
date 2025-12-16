<!-- Modal -->
<div class="modal fade modal-icon" id="editPegawaiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editPegawaiModalLabel">Edit Pegawai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $pegawai->nama }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal Penerimaan Pegawai</label>
                    <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" placeholder="Tanggal Penerimaan Pegawai" name="tgl_masuk" id="tgl_masuk" value="{{ $pegawai->tgl_masuk }}">
                    @error('tgl_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">NBM</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" oninput="nipNumbers(this.value)" placeholder="19xxxxxx" value="{{ $pegawai->nip }}">
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">NIK <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" oninput="nikNumbers(this.value)" placeholder="35xxxxxxx" value="{{ $pegawai->nik }}" required>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Gender <span style="color:red">*</span></label>
                    <div class="form-check ml-3">
                        @if ($pegawai->gender == 'L')
                            <input class="form-check-input" type="radio" name="gender" value="L" checked>
                        @else
                            <input class="form-check-input" type="radio" name="gender" value="L">
                        @endif
                        <label class="form-check-label" for="L">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        @if ($pegawai->gender == 'P')
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
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Surabaya" name="tempat_lahir" id="tempat_lahir" value="{{ $pegawai->tempat_lahir }}" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Lahir <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" name="tgl_lahir" id="tgl_lahir" value="{{ $pegawai->tgl_lahir }}" required>
                        @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">No.Handphone/Whatsapp <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="085xxxx" name="no_hp" id="no_hp" oninput="phoneNumbers(this.value)" value="{{ $pegawai->no_hp }}" required>
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat <span style="color:red">*</span></label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" required>{{ trim($pegawai->alamat) }}</textarea>
                    @error('alamat')
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
