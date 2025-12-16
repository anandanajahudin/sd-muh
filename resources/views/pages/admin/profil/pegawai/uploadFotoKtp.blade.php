<!-- Modal -->
<div class="modal fade modal-icon" id="addFotoKtpModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFotoKtpModalLabel">Upload Foto KTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai.storeFotoKtp', $dataProfil->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Foto <span style="color:red">*</span></label>
                        <input class="form-control @error('foto_ktp') is-invalid @enderror" name="foto_ktp"
                            id="foto_ktp" type="file" placeholder="Foto KTP">
                        <small>Ukuran maksimal foto 2 MB</small>
                        @error('foto_ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" class="form-control" name="id_pegawai" id="id_pegawai"
                        value="{{ $dataProfil->id }}" readonly>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
