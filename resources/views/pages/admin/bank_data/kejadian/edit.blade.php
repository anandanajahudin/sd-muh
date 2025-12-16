<!-- Modal -->
<div class="modal fade modal-icon" id="editKejadianSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKejadianSiswaModalLabel">Edit Kejadian Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('kejadianSiswa.update', $kejadianSiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul Kejadian <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul Kejadian" value="{{ $kejadianSiswa->judul }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal Kejadian <span style="color:red">*</span></label>
                    <input type="date" class="form-control @error('tgl_kejadian') is-invalid @enderror" placeholder="Tanggal Kejadian" name="tgl_kejadian" id="tgl_kejadian" value="{{ $kejadianSiswa->tgl_kejadian }}" required>
                    @error('tgl_kejadian')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi <span style="color:red">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" required>{{ trim($kejadianSiswa->deskripsi) }}</textarea>
                    @error('deskripsi')
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

@push('scripts')
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endpush
