<!-- Modal -->
<div class="modal fade modal-icon" id="editDetailEkskulModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editDetailEkskulModalLabel">Edit Detail Ekskul</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('detailEkskul.update', $detailEkskul->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Juara 1 Lomba Paskibra" value="{{ $detailEkskul->judul }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Jenis <span style="color:red">*</span></label>
                    <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                        @if ($detailEkskul->jenis == null)
                            <option selected disabled>Pilih jenis detail ekskul</option>
                        @else
                            <option value="{{ $detailEkskul->jenis }}" selected>{{ $detailEkskul->jenis }}</option>
                        @endif
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
                    <textarea class="form-control" name="deskripsi" id="deskripsi">{{ trim($detailEkskul->deskripsi) }}</textarea>
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

{{-- @push('scripts')
    <script>
        $(function() {
            $('#jenis').on('change', function() {
            if (this.value == 'Lainnya') {
                $("#jenislain").show();
            }
        });
        });
    </script>
@endpush --}}
