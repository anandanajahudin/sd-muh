<!-- Modal -->
<div class="modal fade modal-icon" id="editFileDetailEkskulModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editFileDetailEkskulModalLabel">Edit File Detail Ekskul</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('detailEkskul.updateFile', $detailEkskul->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Foto <span style="color:red">*</span></label>
                    <input class="form-control @error('file') is-invalid @enderror" name="file" id="file" type="file" placeholder="Foto Detail Ekskul" required>
                    <small>Hanya untuk file gambar maksimal 2 MB</small>
                    @error('file')
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
