<!-- Modal -->
<div class="modal fade modal-icon" id="editPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKelasModalLabel">Edit Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('profilku.updatePasswordProfilSiswa', $dataProfil->userSiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Password Baru <span style="color:red">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="Password" placeholder="********" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi Password Baru <span style="color:red">*</span></label>
                    <input type="password" class="form-control" name="confpassword" id="ConfirmPassword" placeholder="********" required>
                </div>
            </div>
            <div class="modal-footer">
                <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
            </div>
        </form>
      </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $("#ConfirmPassword").on('keyup', function() {
                var password = $("#Password").val();
                var confirmPassword = $("#ConfirmPassword").val();

                if (password != confirmPassword) {
                    $("#CheckPasswordMatch").html("Password tidak sesuai!").css("color","red");
                } else if (password == '' && confirmPassword == '') {
                    $("#CheckPasswordMatch").html("Password tidak boleh kosong!").css("color","red");
                } else {
                    $("#CheckPasswordMatch").html("Password sesuai!<br/><button type='submit' class='btn btn-primary'>Simpan</button>").css("color","green");
                }
            });
        });
    </script>
@endpush
