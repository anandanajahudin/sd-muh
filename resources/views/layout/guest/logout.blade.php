<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('logout') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group mb-3">
                <label class="form-label">Apakah Anda yakin ingin keluar dari halaman ini?</label>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Keluar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
