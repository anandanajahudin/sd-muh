<!-- Modal -->
<div class="modal fade modal-icon" id="editBeritaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editBeritaModalLabel">Edit Berita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul Berita" value="{{ $berita->judul }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Slug</label>
                    <div class="input-group">
                        <input type="text"
                            class="form-control"
                            value="{{ $berita->slug }}"
                            readonly>

                        <form action="{{ route('berita.regenerateSlug', $berita->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin regenerate slug?')">
                            @csrf
                            <button class="btn btn-warning" type="submit">
                                🔄 Regenerate Slug
                            </button>
                        </form>
                    </div>
                </div>

                @if ($berita->jenis == 'agenda')
                    <div class="form-group">
                        <label class="form-label">Tanggal Agenda <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('tgl_agenda') is-invalid @enderror" name="tgl_agenda" id="tgl_agenda" value="{{ $berita->tgl_agenda }}" required>
                        @error('tgl_agenda')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" class="form-control @error('link_vidio') is-invalid @enderror" name="link_vidio" id="tgl_agenda" readonly>

                @elseif ($berita->jenis == 'berita' || $berita->jenis == 'opini')
                    <input type="hidden" class="form-control @error('link_vidio') is-invalid @enderror" name="link_vidio" id="tgl_agenda" readonly>
                    <input type="hidden" class="form-control @error('tgl_agenda') is-invalid @enderror" name="tgl_agenda" id="tgl_agenda" readonly>

                @else
                    <div class="form-group">
                        <label class="form-label">Link Vidio (Youtube) <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('link_vidio') is-invalid @enderror" name="link_vidio" id="link_vidio" placeholder="OEycjwiXYgA" value="{{ $berita->link_vidio }}" required>
                        <small>Contoh link : https://www.youtube.com/watch?v=<b>OEycjwiXYgA</b></small><br/>
                        <small>(hanya kode yang bertulis tebal yang diinputkan)</small>
                        @error('link_vidio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" class="form-control @error('tgl_agenda') is-invalid @enderror" name="tgl_agenda" id="tgl_agenda" readonly>
                @endif

                <div class="form-group">
                    <label class="form-label">Deskripsi <span style="color:red">*</span></label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ trim($berita->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" value="{{ $berita->jenis }}" readonly>
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

