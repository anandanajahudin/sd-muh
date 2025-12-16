<!-- Modal -->
<div class="modal fade modal-icon" id="editPpdbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editPpdbModalLabel">Edit Master PPDB</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('ppdbMaster.update', $ppdb->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="PPDB 2021/2022" value="{{ $ppdb->judul }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun Ajaran<span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran" id="tahun_ajaran" placeholder="2021/2022" value="{{ $ppdb->tahun_ajaran }}" required>
                    @error('tahun_ajaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Mulai PPDB <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_awal') is-invalid @enderror" name="tgl_awal" id="tgl_awal" value="{{ $ppdb->tgl_awal }}" required>
                        @error('tgl_awal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Batas PPDB <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_batas') is-invalid @enderror" name="tgl_batas" id="tgl_batas" value="{{ $ppdb->tgl_batas }}" required>
                        @error('tgl_batas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" id="tahun" oninput="tahun(this.value)" placeholder="2021" value="{{ $ppdb->tahun }}" required>
                    @error('tahun')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi">{{ trim($ppdb->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Link Vidio PPDB</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" placeholder="OEycjwiXYgA" value="{{ $ppdb->link }}">
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
