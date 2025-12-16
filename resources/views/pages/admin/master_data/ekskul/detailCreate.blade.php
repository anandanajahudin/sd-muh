<!-- Modal -->
<div class="modal fade modal-icon" id="addDetailEkskulModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addDetailEkskulModalLabel">Tambah Detail Ekskul ({{ $ekskul }})</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('detailEkskul.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Juara 1 Lomba Paskibra" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Jenis <span style="color:red">*</span></label>
                    <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                        <option selected disabled>Pilih jenis detail ekskul</option>
                        <option value="Brosur">Brosur</option>
                        <option value="Poster">Poster</option>
                        <option value="Kegiatan">Kegiatan</option>
                        <option value="Prestasi">Prestasi</option>
                    </select>
                    @error('jenis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi <small>(opsional)</small></label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ trim(old('deskripsi')) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Foto <small>(opsional)</small></label>
                    <input class="form-control @error('file') is-invalid @enderror" name="file" id="file" type="file" placeholder="Logo Eskul">
                    <small>Ukuran maksimal gambar 2 MB</small>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="id_ekskul" id="id_ekskul" value="{{ $id_ekskul }}" readonly>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>

@push('scripts')
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endpush
