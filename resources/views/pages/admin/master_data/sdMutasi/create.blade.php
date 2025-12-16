<!-- Modal -->
<div class="modal fade modal-icon" id="addSdMutasiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addSdMutasiModalLabel">Tambah SD Mutasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('sdMutasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama SD <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="SD Al Kautsar" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label class="form-label">Provinsi <span style="color:red">*</span></label>
                    <select class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" required>
                        <option selected disabled>Pilih provinsi</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                    </select>
                    @error('provinsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label class="form-label">Kota/Kabupaten <span style="color:red">*</span></label>
                    <select class="form-control @error('kota') is-invalid @enderror" name="kota" id="kota" required>
                        <option selected disabled>Pilih kota</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Sidoarjo">Sidoarjo</option>
                        <option value="Malang">Malang</option>
                    </select>
                    @error('kota')
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

