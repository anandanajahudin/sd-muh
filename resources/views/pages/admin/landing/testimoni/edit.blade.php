<!-- Modal -->
<div class="modal fade modal-icon" id="editTestimoniModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTestimoniModalLabel">Edit Testimoni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dataTestimoni.update', $testimoni->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Anda" value="{{ $testimoni->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Pekerjaan <span style="color:red">*</span></label>
                    <select class="form-control @error('id_pekerjaan') is-invalid @enderror" name="id_pekerjaan" id="id_pekerjaan" required>
                        @if ($testimoni->id_pekerjaan == null)
                            <option selected disabled>Pilih pekerjaan</option>
                        @else
                            <option value="{{ $testimoni->id_pekerjaan }}" selected>{{ $testimoni->pekerjaan->judul }}</option>
                        @endif
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
                        @if ($testimoni->nilai == null)
                            <option selected disabled>Pilih nilai</option>
                        @else
                            @if ($testimoni->nilai == 5)
                                <option value="5" selected>Sangat Baik</option>
                            @elseif ($testimoni->nilai == 4)
                                <option value="4" selected>Baik</option>
                            @elseif ($testimoni->nilai == 3)
                                <option value="3" selected>Cukup</option>
                            @elseif ($testimoni->nilai == 2)
                                <option value="2" selected>Kurang Baik</option>
                            @else
                                <option value="1" selected>Buruk</option>
                            @endif
                        @endif
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
                    <textarea class="form-control @error('testimoni') is-invalid @enderror" name="testimoni" id="testimoni" rows="6" placeholder="Testimoni" required>{{ trim($testimoni->testimoni) }}</textarea>
                    @error('testimoni')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Link Vidio Testimoni</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" placeholder="n6SdjbJS5eI" value="{{ $testimoni->link }}">
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
