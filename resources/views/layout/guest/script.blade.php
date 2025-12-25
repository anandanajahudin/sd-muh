<!-- Favicons -->
<link href="{{ asset('front/img/images/logo.png') }}" rel="icon">
<link href="{{ asset('front/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- ====================== -->
<!-- Google Fonts -->
<link
    href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"
    rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('front/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('front/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

<!-- Vendor JS Files -->
<script src="{{ asset('front/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('front/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('front/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('front/js/main.js') }}"></script>

<!-- Owl Carousel -->
<link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}">

<!-- Icon -->
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="{{ asset('https://kit.fontawesome.com/e4a753eb05.js') }}" crossorigin="anonymous"></script>

<!-- CSS News -->
<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('front/css/newscss/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/ticker-style.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/flaticon.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/slicknav.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/animate.min.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/magnific-popup.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/themify-icons.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/slick.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/nice-select.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/newscss/style.css')}}">
<script src="{{ asset('front/js/tilt.jquery.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.js"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery-key-restrictions.js') }}"></script>

@stack('scripts')


<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"  style="border-radius: 15px">
        <div class="modal-content"  style="border-radius: 25px">
            <div class="modal-header text-center" style="background-color: darkorange; border-radius:25px 25px 25px 25px">
                <h4 class="modal-title w-100 font-weight-bold text-white">Keterangan Calon Peserta Didik</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Nama Lengkap"><br>
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="form-select form-control" id="jk" name="jk_id">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"><br>
                </div>
                <div class="group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir"><br>
                </div>
                <div class="group">
                  <label for="">Alamat Tempat Tinggal</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><br>
              </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Kirim Data</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            {{-- <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default">Login</button>
            </div> --}}
        </div>
    </div>
</div>
