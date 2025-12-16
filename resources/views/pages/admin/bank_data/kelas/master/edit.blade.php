<!-- Modal -->
<div class="modal fade modal-icon" id="editKelasMasterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKelasMasterModalLabel">Edit Master Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('kelasMaster.update', $kelasMaster->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="1 Reguler" value="{{ $kelasMaster->judul }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Jenis <span style="color:red">*</span></label>
                    <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                        @if ($kelasMaster->jenis == null)
                            <option>Pilih jenis kelas</option>
                        @else
                            <option value="{{ $kelasMaster->jenis }}">{{ $kelasMaster->jenis }}</option>
                        @endif
                        <option value="Reguler">Reguler</option>
                        <option value="Billingual">Billingual</option>
                    </select>
                    @error('jenis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Kelas <span style="color:red">*</span></label>
                    <select class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="kelas" required>
                        @if ($kelasMaster->kelas == null)
                            <option selected disabled>Pilih kelas</option>
                        @else
                            <option value="{{ $kelasMaster->kelas }}" selected>{{ $kelasMaster->kelas }}</option>
                        @endif
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    {{-- <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="kelas" oninput="kelas(this.value)" placeholder="1" value="{{ $kelasMaster->kelas }}"> --}}
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Biaya Daftar Ulang <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('biaya_daful') is-invalid @enderror" name="biaya_daful" id="biaya_daful" oninput="daful(this.value)" placeholder="500000" value="{{ $kelasMaster->biaya_daful }}">
                    @error('biaya_daful')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">SPP <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('spp') is-invalid @enderror" name="spp" id="spp" oninput="spp(this.value)" placeholder="200000" value="{{ $kelasMaster->spp }}">
                    @error('spp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Keterangan <span style="color:red">*</span></label>
                    <textarea class="form-control" name="keterangan" id="keterangan" required>{{ trim($kelasMaster->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi <span style="color:red">*</span></label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ trim($kelasMaster->deskripsi) }}</textarea>
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
        CKEDITOR.replace('keterangan');
        CKEDITOR.replace('deskripsi');
    </script>
    <script>
        function kelas(text) {
            text = text.replace(/[^0-9]/g, '');
            var inputResult = document.getElementById('kelas');
            inputResult.value = text;
        }
        function daful(text) {
            text = text.replace(/[^0-9]/g, '');
            var inputResult = document.getElementById('biaya_daful');
            inputResult.value = text;
        }
        function spp(text) {
            text = text.replace(/[^0-9]/g, '');
            var inputResult = document.getElementById('spp');
            inputResult.value = text;
        }
    </script>
@endpush
