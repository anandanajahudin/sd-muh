<!-- Modal -->
<div class="modal fade modal-icon" id="addModulModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModulModalLabel">Tambah Modul</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dataModul.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Modul untuk Kelas <span style="color:red">*</span></label>
                    <select class="form-control @error('id_kelas_master') is-invalid @enderror" name="id_kelas_master" id="id_kelas_master" required>
                        <option selected disabled>Pilih kelas</option>
                        @foreach ($kelasMaster as $kelasMaster)
                            <option value="{{ $kelasMaster->id }}">Kelas {{ $kelasMaster->kelas.' ('.$kelasMaster->jenis.')' }}</option>
                        @endforeach
                    </select>
                    @error('id_kelas_master')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Matematika" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Jenis <span style="color:red">*</span></label>
                    <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                        <option selected disabled>Pilih jenis modul</option>
                        @foreach ($jenisModul as $jenisModul)
                            <option value="{{ $jenisModul->id }}">{{ $jenisModul->judul }}</option>
                        @endforeach
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" class="form-control" style="display: none" name="jenislain" id="jenislain" placeholder="Jenis modul lain">
                    @error('jenis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="Deskripsi Modul" value="{{ old('deskripsi') }}">
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">File Modul <span style="color:red">*</span></label>
                    <input class="form-control @error('file') is-invalid @enderror" name="file" id="file" type="file" placeholder="File Modul" required>
                    @error('file')
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
        $(function() {
            $('#jenis').on('change', function() {
                if (this.value == 'Lainnya') {
                    $("#jenislain").show();
                }
            });
        });
    </script>
@endpush
