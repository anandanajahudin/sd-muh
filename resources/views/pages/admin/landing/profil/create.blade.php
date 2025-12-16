<!-- Modal -->
<div class="modal fade modal-icon" id="addProfilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProfilModalLabel">Tambah Profil Sekolah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dataProfil.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul Profil" value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Keterangan <span style="color:red">*</span></label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" required>{{ trim(old('keterangan')) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi <span style="color:red">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" required>{{ trim(old('deskripsi')) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Judul Visi <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul_visi') is-invalid @enderror" name="judul_visi" id="judul_visi" placeholder="Judul Visi" value="{{ old('judul_visi') }}">
                    @error('judul_visi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi Visi <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('deskripsi_visi') is-invalid @enderror" name="deskripsi_visi" id="deskripsi_visi" placeholder="Deskripsi Visi" value="{{ old('deskripsi_visi') }}">
                    @error('deskripsi_visi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Operasional <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('operasional') is-invalid @enderror" name="operasional" id="operasional" placeholder="Senin - Sabtu..." value="{{ old('operasional') }}">
                    @error('operasional')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email <span style="color:red">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Telepon <span style="color:red">*</span></label>
                    <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="Telepon Sekolah" value="{{ old('telp') }}">
                    @error('telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Facebook <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('link_fb') is-invalid @enderror" name="link_fb" id="link_fb" placeholder="Link Facebook Sekolah" value="{{ old('link_fb') }}">
                    @error('link_fb')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Instagram <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('link_ig') is-invalid @enderror" name="link_ig" id="link_ig" placeholder="Link Instagram Sekolah" value="{{ old('link_ig') }}">
                    @error('link_ig')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Twitter <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('link_twitter') is-invalid @enderror" name="link_twitter" id="link_twitter" placeholder="Link Twitter Sekolah" value="{{ old('link_twitter') }}">
                    @error('link_twitter')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Youtube <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('link_yutub') is-invalid @enderror" name="link_yutub" id="link_yutub" placeholder="Link Youtube Sekolah" value="{{ old('link_yutub') }}">
                    @error('link_yutub')
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
