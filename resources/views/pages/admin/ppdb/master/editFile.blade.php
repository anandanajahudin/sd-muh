<!-- Modal -->
<div class="modal fade modal-icon" id="editFileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editFileModalLabel">Upload File Brosur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('ppdbMaster.updateFile', $ppdb->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">File Brosur <span style="color:red">*</span></label>
                    <input class="form-control @error('file') is-invalid @enderror" name="file" id="file" type="file" placeholder="File Brosur">
                    <small>Hanya untuk file PDF</small>
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
