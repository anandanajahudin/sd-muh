<!-- Modal -->
<div class="modal fade modal-icon" id="editGambarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editGambarModalLabel">Upload Gambar Brosur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('ppdbMaster.updateGambar', $ppdb->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Gambar Brosur <span style="color:red">*</span></label>
                    <input class="form-control @error('brosur') is-invalid @enderror" name="brosur" id="brosur" type="file" placeholder="Gambar Brosur">
                    <small>Hanya untuk file gambar (jpg, jpeg, png)</small>
                    @error('brosur')
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
