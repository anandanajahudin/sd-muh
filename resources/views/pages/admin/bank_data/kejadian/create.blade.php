<!-- Modal -->
<div class="modal fade modal-icon" id="addKejadianSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKejadianSiswaModalLabel">Tambah Kejadian Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('kejadianSiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label class="form-label">Tahun Ajaran <span style="color:red">*</span></label>
                        <select class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran" id="tahun_ajaran" required>
                            <option selected disabled>Pilih tahun ajaran</option>
                            @foreach ($ppdb as $ppdbItem)
                                <option value="{{ $ppdbItem->tahun_ajaran }}">{{ $ppdbItem->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                        @error('tahun_ajaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="form-label">Kelas <span style="color:red">*</span></label>
                        <select class="form-control" name="kelas" id="kelas" required>
                            <option selected disabled>Pilih tahun ajaran terlebih dahulu</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Siswa <span style="color:red">*</span></label>
                    <select class="form-control @error('id_siswa') is-invalid @enderror" name="id_siswa" id="id_siswa" required>
                        <option selected disabled>Pilih kelas terlebih dahulu</option>
                    </select>
                    @error('id_siswa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Judul Kejadian <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul Kejadian" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal Kejadian <span style="color:red">*</span></label>
                    <input type="date" class="form-control @error('tgl_kejadian') is-invalid @enderror" placeholder="Tanggal Kejadian" name="tgl_kejadian" id="tgl_kejadian" value="{{ old('tgl_kejadian') }}" required>
                    @error('tgl_kejadian')
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

    <script>
        $(document).ready(function() {
            $('#tahun_ajaran').change(function() {
                var tahunAjaranId = $(this).val();

                // Fetch classes based on selected year
                $.ajax({
                    url: '{{ route('getClassesByYear') }}',
                    type: 'GET',
                    data: { tahun_ajaran: tahunAjaranId },
                    success: function(response) {
                        $('#kelas').empty().append('<option selected disabled>Pilih kelas</option>');
                        $('#id_siswa').empty().append('<option selected disabled>Pilih kelas</option>');
                        $.each(response.classes, function(key, value) {
                            $('#kelas').append('<option value="'+ value.id +'">'+ value.nama_kelas +'</option>');
                        });
                    }
                });
            });

            $('#kelas').change(function() {
                var kelasId = $(this).val();
                var tahunAjaranId = $('#tahun_ajaran').val();

                // Fetch students based on selected class and year
                $.ajax({
                    url: '{{ route('getStudentsByClassAndYear') }}',
                    type: 'GET',
                    data: { kelas_id: kelasId, tahun_ajaran: tahunAjaranId },
                    success: function(response) {
                        $('#id_siswa').empty().append('<option selected disabled>Pilih siswa</option>');
                        $.each(response.students, function(key, value) {
                            $('#id_siswa').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush
