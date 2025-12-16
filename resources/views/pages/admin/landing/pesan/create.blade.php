<!-- Modal -->
<div class="modal fade modal-icon" id="addPesanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPesanModalLabel">Tambah Pesan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dataPesan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">No.Handphone/Whatsapp <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" oninput="phoneNumbers(this.value)" placeholder="08xxxxxx" value="{{ old('telp') }}" required/>
                    @error('telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="ahmadjoko90@gmail.com" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Pesan <span style="color:red">*</span></label>
                    <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" id="pesan" rows="6" placeholder="Pesan Anda" required>{{ trim(old('pesan')) }}</textarea>
                    @error('pesan')
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

<script>
    function phoneNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('telp');
        inputResult.value = text;
    }
</script>
