<!-- Modal -->
<div class="modal fade modal-icon" id="editKelasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKelasModalLabel">Edit Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Kelas <span style="color:red">*</span></label>
                    <select class="form-control @error('id_kelas_master') is-invalid @enderror" name="id_kelas_master" id="id_kelas_master" required>
                        @if ($kelas->id_kelas_master == null)
                            <option selected disabled>Pilih kelas</option>
                        @else
                            <option value="{{ $kelas->id_kelas_master }}" selected>Kelas {{ $kelas->tipeKelas->kelas.' ('.$kelas->tipeKelas->jenis.')' }}</option>
                        @endif
                        @foreach ($kelasMaster as $kelasMaster)
                            <option value="{{ $kelasMaster->id }}">Kelas {{ $kelasMaster->kelas.' ('.$kelasMaster->jenis.')' }}</option>
                        @endforeach
                    </select>
                    @error('id_kelas_master')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" name="nama_kelas" id="nama_kelas" placeholder="1 A" value="{{ $kelas->nama_kelas }}">
                    @error('nama_kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Keterangan <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" placeholder="1 Ceria" value="{{ $kelas->keterangan }}">
                    @error('keterangan')
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
