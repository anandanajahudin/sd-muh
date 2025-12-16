<!-- Modal -->
<div class="modal fade modal-icon" id="diterimaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="diterimaModalLabel">Konfirmasi Penerimaan Calon Siswa/Siswi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('siswa.diterima', $ppdbSiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $ppdbSiswa->nama }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Asal Sekolah (TK)</label>
                        <input type="text" class="form-control" value="{{ $ppdbSiswa->tkSiswa->nama }}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Pendaftaran <span style="color:red">*</span></label>
                        <input type="text" class="form-control" value="{{ date('d M Y, h:i:s', strtotime($ppdbSiswa->created_at)) }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Diterima <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" placeholder="Tanggal Lahir" name="tgl_masuk" id="tgl_masuk" value="{{ old('tgl_masuk') }}" required>
                        @error('tgl_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Kelas <span style="color:red">*</span></label>
                    <select class="form-control @error('id_kelas_siswa') is-invalid @enderror" name="id_kelas_siswa" id="id_kelas_siswa" required>
                        <option selected disabled>Pilih kelas</option>
                        @foreach ($kelasSiswa as $kelasSiswa)
                            <option value="{{ $kelasSiswa->id }}">Kelas {{ $kelasSiswa->namaKelas->nama_kelas. ' ('.$kelasSiswa->tahun_ajaran.')' }}</option>
                        @endforeach
                    </select>
                    @error('id_kelas_siswa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">NIS</label>
                    <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" id="nis" oninput="nisNumbers(this.value)" placeholder="Nomor Induk Siswa" value="{{ old('nis') }}"/>
                    @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">NISN</label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" oninput="nisnNumbers(this.value)" placeholder="Nomor Induk Siswa Nasional" value="{{ old('nisn') }}"/>
                    @error('nisn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Email <span style="color:red">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email siswa/siswi" value="{{ old('email') }}" required/>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Username <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Username siswa/siswi" value="{{ old('name') }}" required/>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Password <span style="color:red">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password siswa/siswi" value="{{ old('password') }}" required/>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="id_ppdb_siswa" id="id_ppdb_siswa" value="{{ $ppdbSiswa->id }}" readonly required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>

<script>
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
    function phoneNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('nohp');
        inputResult.value = text;
    }
</script>
