<!-- Modal -->
<div class="modal fade modal-icon" id="editPrestasiSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editPrestasiSiswaModalLabel">Edit Prestasi Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('prestasiSiswa.update', $prestasiSiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul Prestasi <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul Prestasi" value="{{ $prestasiSiswa->judul }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label class="form-label">Kategori <span style="color:red">*</span></label>
                        <select class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" required>
                            @if ($prestasiSiswa->kategori == null)
                                <option selected disabled>Pilih kategori</option>
                            @else
                                <option value="{{ $prestasiSiswa->kategori }}" selected>{{ $prestasiSiswa->kategori }}</option>
                            @endif
                            <option value="Nasional">Nasional</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Kota/Kabupaten">Kota/Kabupaten</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-label">Juara <span style="color:red">*</span></label>
                        <select class="form-control @error('juara') is-invalid @enderror" name="juara" id="juara" required>
                            @if ($prestasiSiswa->juara == null)
                                <option selected disabled>Pilih juara</option>
                            @else
                                <option value="{{ $prestasiSiswa->juara }}" selected>{{ $prestasiSiswa->juara }}</option>
                            @endif
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        @error('juara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label class="form-label">Tempat Kompetisi <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('tempat_kompetisi') is-invalid @enderror" placeholder="Surabaya" name="tempat_kompetisi" id="tempat_kompetisi" value="{{ $prestasiSiswa->tempat_kompetisi }}" required>
                        @error('tempat_kompetisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="form-label">Tanggal Kompetisi <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_kompetisi') is-invalid @enderror" placeholder="Tanggal Kompetisi" name="tgl_kompetisi" id="tgl_kompetisi" value="{{ $prestasiSiswa->tgl_kompetisi }}" required>
                        @error('tgl_kompetisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi <span style="color:red">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" required>{{ trim($prestasiSiswa->deskripsi) }}</textarea>
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
