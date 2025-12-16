<!-- Modal -->
<div class="modal fade modal-icon" id="addPembayaranModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPembayaranModalLabel">Upload Bukti Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('ppdbSiswa.uploadBuktiPembayaran', $ppdbSiswa->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Bukti Pembayaran <span style="color:red">*</span></label>
                    <input class="form-control @error('file') is-invalid @enderror" name="file" id="file" type="file" placeholder="File Bukti Pembayaran">
                    <small>Hanya untuk file pdf atau gambar max. 2 MB</small>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" class="form-control" name="id_ppdb_siswa" id="id_ppdb_siswa" value="{{ $ppdbSiswa->id }}" readonly>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>
