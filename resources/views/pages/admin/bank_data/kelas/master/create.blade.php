<!-- Modal -->
<div class="modal fade modal-icon" id="addKelasMasterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKelasMasterModalLabel">Tambah Master Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('kelasMaster.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="1 Reguler" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Jenis <span style="color:red">*</span></label>
                    <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                        <option selected disabled>Pilih jenis kelas</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Billingual">Billingual</option>
                    </select>
                    @error('jenis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Kelas <span style="color:red">*</span></label>
                    <select class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="kelas" required>
                        <option selected disabled>Pilih kelas</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Biaya Daftar Ulang <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('biaya_daful') is-invalid @enderror" name="biaya_daful2" id="biaya_daful2" placeholder="500000" value="{{ old('biaya_daful') }}">
                    <input type="hidden" name="biaya_daful" id="biaya_daful" readonly>
                    @error('biaya_daful')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">SPP <span style="color:red">*</span></label>
                    <input type="text" class="form-control @error('spp') is-invalid @enderror" name="spp2" id="spp2" placeholder="200000" value="{{ old('spp') }}">
                    <input type="hidden" name="spp" id="spp" readonly>
                    @error('spp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Keterangan <span style="color:red">*</span></label>
                    <textarea class="form-control" name="keterangan" id="keterangan" required>{{ trim(old('keterangan')) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi <span style="color:red">*</span></label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ trim(old('deskripsi')) }}</textarea>
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
        CKEDITOR.replace('keterangan');
        CKEDITOR.replace('deskripsi');
    </script>
    <script>
        $(function() {
            $('.alphaonly').bind('keyup blur',function(){
                var text = $(this);
                text.val(text.val().replace(/[^a-z]/g,'') ); }
            );

            $("#kelas").keyup(function(e) {
                this.value = this.value.replace(/[^1-6]/g, '');
                $("#kelas").val($(this).val());
            });

            $("#biaya_daful2").keyup(function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                $("#biaya_daful").val($(this).val());
                $(this).val(format($(this).val()));
            });

            $("#spp2").keyup(function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                $("#spp").val($(this).val());
                $(this).val(format($(this).val()));
            });

        });

        var format = function(num){
            var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
            if(str.indexOf(",") > 0) {
                parts = str.split(",");
                str = parts[0];
            }
            str = str.split("").reverse();
            for(var j = 0, len = str.length; j < len; j++) {
                if(str[j] != ".") {
                output.push(str[j]);
                if(i%3 == 0 && j < (len - 1)) {
                    output.push(".");
                }
                i++;
                }
            }
            formatted = output.reverse().join("");
            return("" + formatted + ((parts) ? "," + parts[1].substr(0, 2) : ""));
        };
    </script>
@endpush

