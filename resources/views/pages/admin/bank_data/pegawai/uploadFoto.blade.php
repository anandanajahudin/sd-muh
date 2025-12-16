<!-- Modal -->
<div class="modal fade modal-icon" id="addFotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addFotoModalLabel">Upload Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('pegawai.storeFoto', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Foto <span style="color:red">*</span></label>
                    <input class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" type="file" placeholder="Foto Pegawai">
                    <small>Ukuran maksimal foto 2 MB</small>
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" class="form-control" name="id_pegawai" id="id_pegawai" value="{{ $pegawai->id }}" readonly>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>
