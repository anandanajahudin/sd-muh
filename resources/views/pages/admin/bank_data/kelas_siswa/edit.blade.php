<!-- Modal -->
<div class="modal fade modal-icon" id="editKelasSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKelasSiswaModalLabel">Edit Wali Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('kelasSiswa.update', $kelasSiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Kelas <span style="color:red">*</span></label>
                    <select class="form-control @error('id_kelas') is-invalid @enderror" name="id_kelas" id="id_kelas" required>
                        @if ($kelasSiswa->id_kelas == null)
                            <option selected disabled>Pilih kelas</option>
                        @else
                            <option value="{{ $kelasSiswa->id_kelas }}" selected>
                                Kelas {{ $kelasSiswa->namaKelas->nama_kelas }}
                            </option>
                        @endif
                        @foreach ($kelas as $kelas)
                            <option value="{{ $kelas->id }}">Kelas {{ $kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('id_kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun Ajaran</label>
                    <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran" id="tahun_ajaran" placeholder="2022/2023" value="{{ $kelasSiswa->tahun_ajaran }}">
                    @error('tahun_ajaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun</label>
                    <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" id="tahun" oninput="tahunNumbers(this.value)" placeholder="2022" value="{{ $kelasSiswa->tahun }}">
                    @error('tahun')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Wali Kelas <span style="color:red">*</span></label>
                    <select class="form-control @error('id_pegawai') is-invalid @enderror" name="id_pegawai" id="id_pegawai" required>
                        @if ($kelasSiswa->id_pegawai == null)
                            <option selected disabled>Pilih wali kelas</option>
                        @else
                            <option value="{{ $kelasSiswa->id_pegawai }}" selected>{{ $kelasSiswa->waliKelas->nama }}</option>
                        @endif
                        @foreach ($pegawai as $pegawai)
                            <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_pegawai')
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
    function tahunNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('tahun');
        inputResult.value = text;
    }
</script>
