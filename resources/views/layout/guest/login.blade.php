<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-outline-coloured alert-dismissible mt-3" role="alert">
                <div class="alert-message">
                    <h5 class="text-center"><strong style="margin-right:10px;">{{ session('loginError') }}</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
                </div>
            </div>
        @endif

        <form action="login" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Anda" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Password</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" value="{{ old('password') }}" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Masuk</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
