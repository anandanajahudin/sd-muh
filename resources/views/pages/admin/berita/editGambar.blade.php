<!-- Modal -->
<div class="modal fade modal-icon" id="editGambarModal" tabindex="-1" aria-labelledby="editGambarModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGambarModalLabel">Upload Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('berita.updateGambar', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Gambar <span style="color:red">*</span></label>
                        <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar"
                            type="file" placeholder="Gambar Berita">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Keterangan Gambar <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('keterangan_img') is-invalid @enderror"
                            name="keterangan_img" id="keterangan_img" placeholder="Keterangan Gambar"
                            value="{{ $berita->keterangan_img }}" required>
                        @error('keterangan_img')
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
