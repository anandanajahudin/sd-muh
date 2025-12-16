<!-- Modal -->
<div class="modal fade modal-icon" id="editModulModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModulModalLabel">Edit Modul</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dataModul.update', $dataModul->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Kelas <span style="color:red">*</span></label>
                    <select class="form-control @error('id_kelas_master') is-invalid @enderror" name="id_kelas_master" id="id_kelas_master" required>
                        @if ($dataModul->id_kelas_master == null)
                            <option selected disabled>Pilih kelas</option>
                        @else
                            <option value="{{ $dataModul->id_kelas_master }}" selected>Kelas {{ $dataModul->modulKelas->kelas.' ('.$dataModul->modulKelas->jenis.')' }}</option>
                        @endif
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
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Matematika" value="{{ $dataModul->judul }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Jenis <span style="color:red">*</span></label>
                    <select class="form-control @error('id_jenis') is-invalid @enderror" name="id_jenis" id="id_jenis" required>
                        @if ($dataModul->id_jenis == null)
                            <option selected disabled>Pilih jenis modul</option>
                        @else
                            <option value="{{ $dataModul->id_jenis }}" selected>{{ $dataModul->jenisModul->judul }}</option>
                        @endif
                        @foreach ($jenisModul as $jenisModul)
                            <option value="{{ $jenisModul->id }}">{{ $jenisModul->judul }}</option>
                        @endforeach
                    </select>
                    @error('id_jenis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="Deskripsi Modul" value="{{ $dataModul->deskripsi }}">
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

{{-- @push('scripts')
    <script>
        $(function() {
            $('#id_jenis').on('change', function() {
            if (this.value == 'Lainnya') {
                $("#jenislain").show();
            }
        });
        });
    </script>
@endpush --}}
