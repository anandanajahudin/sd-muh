<!-- Modal -->
<div class="modal fade modal-icon" id="addTestimoniModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTestimoniModalLabel">Tambah Testimoni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dataTestimoni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Anda" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Pekerjaan <span style="color:red">*</span></label>
                    <select class="form-control @error('id_pekerjaan') is-invalid @enderror" name="id_pekerjaan" id="id_pekerjaan" required>
                        <option selected disabled>Pilih pekerjaan</option>
                        @foreach ($listPekerjaan as $listPekerjaan)
                            <option value="{{ $listPekerjaan->id }}">{{ $listPekerjaan->judul }}</option>
                        @endforeach
                    </select>
                    @error('id_pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Nilai <span style="color:red">*</span></label>
                    <select class="form-control @error('nilai') is-invalid @enderror" name="nilai" id="nilai" required>
                        <option selected disabled>Pilih nilai</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Cukup</option>
                        <option value="2">Kurang Baik</option>
                        <option value="1">Buruk</option>
                    </select>
                    @error('nilai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Testimoni <span style="color:red">*</span></label>
                    <textarea class="form-control @error('testimoni') is-invalid @enderror" name="testimoni" id="testimoni" rows="6" placeholder="Testimoni" required>{{ trim(old('testimoni')) }}</textarea>
                    @error('testimoni')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Foto</label>
                    <input class="form-control @error('file') is-invalid @enderror" name="file" id="file" type="file" placeholder="Foto">
                    <small>Hanya untuk gambar max. 2 MB</small>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Link Vidio Testimoni</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" placeholder="n6SdjbJS5eI" value="{{ old('link') }}">
                    <small>Contoh link : https://www.youtube.com/watch?v=<b>n6SdjbJS5eI</b></small><br/>
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
