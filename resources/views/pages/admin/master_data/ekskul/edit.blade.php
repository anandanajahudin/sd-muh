<!-- Modal -->
<div class="modal fade modal-icon" id="editEkskulModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editEkskulModalLabel">Edit Ekskul</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dataEkskul.update', $dataEkskul->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Pramuka" value="{{ $dataEkskul->judul }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Jenis <span style="color:red">*</span></label>
                    <select class="form-control @error('id_jenis_ekskul') is-invalid @enderror"
                            name="id_jenis_ekskul"
                            id="id_jenis_ekskul"
                            required>
                        <option selected disabled>Pilih jenis ekskul</option>

                        @foreach ($jenis as $j)
                            <option value="{{ $j->id }}"
                                {{ old('id_jenis_ekskul', $dataEkskul->id_jenis_ekskul ?? '') == $j->id ? 'selected' : '' }}>
                                {{ $j->judul }}
                            </option>
                        @endforeach
                    </select>

                    @error('id_jenis_ekskul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi <small>(opsional)</small></label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi">{{ trim($dataEkskul->deskripsi) }}</textarea>
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

