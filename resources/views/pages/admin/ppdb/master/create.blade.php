<!-- Modal -->
<div class="modal fade modal-icon" id="addPpdbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPpdbModalLabel">Tambah Master PPDB</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('ppdbMaster.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="PPDB 2021/2022" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun Ajaran <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran" id="tahun_ajaran" placeholder="2021/2022" value="{{ old('tahun_ajaran') }}" required>
                    @error('tahun_ajaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Mulai PPDB <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_awal') is-invalid @enderror" name="tgl_awal" id="tgl_awal" value="{{ old('tgl_awal') }}" required>
                        @error('tgl_awal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Batas PPDB <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_batas') is-invalid @enderror" name="tgl_batas" id="tgl_batas" value="{{ old('tgl_batas') }}" required>
                        @error('tgl_batas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" id="tahun" oninput="tahun(this.value)" placeholder="2021" value="{{ old('tahun') }}" required>
                    @error('tahun')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi">{{ trim(old('deskripsi')) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Gambar Brosur</label>
                        <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" type="file" placeholder="Gambar Brosur">
                        <small>Hanya untuk file gambar (jpg, jpeg, png)</small>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">File Brosur (PDF)</label>
                        <input class="form-control @error('file') is-invalid @enderror" name="file" id="file" type="file" placeholder="File Brosur PDF">
                        <small>Hanya untuk file PDF</small>
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Link Vidio PPDB</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" placeholder="OEycjwiXYgA" value="{{ old('link') }}">
                    <small>Contoh link : https://www.youtube.com/watch?v=<b>OEycjwiXYgA</b></small><br/>
                    <small>(hanya kode yang bertulis tebal yang diinputkan)</small>
                    @error('link')
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
        function tahun(text) {
            text = text.replace(/[^0-9]/g, '');
            var inputResult = document.getElementById('tahun');
            inputResult.value = text;
        }
    </script>

    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endpush

