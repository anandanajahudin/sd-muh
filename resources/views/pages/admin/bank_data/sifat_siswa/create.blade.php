<!-- Modal -->
<div class="modal fade modal-icon" id="addSifatSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addSifatSiswaModalLabel">Tambah Sifat Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('sifatSiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Siswa <span style="color:red">*</span></label>
                    <select class="form-control @error('id_siswa') is-invalid @enderror" name="id_siswa" id="id_siswa" required>
                        <option selected disabled>Pilih siswa</option>
                        @foreach ($siswa as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->ppdbSiswa->nama. ' - '. $siswa->kelasSiswa->namaKelas->nama_kelas .' ('.$siswa->kelasSiswa->tahun_ajaran.')' }}</option>
                        @endforeach
                    </select>
                    @error('id_siswa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Sifat <span style="color:red">*</span></label>
                        </div>
                        <div class="col-md-12">
                            @foreach ($sifatMaster as $sifatMaster)
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input type="checkbox" value="{{ $sifatMaster->id }}" name="id_sifat[]" id="id_sifat[]">
                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">{{ $sifatMaster->judul }}</span>
                                    </label>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
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
