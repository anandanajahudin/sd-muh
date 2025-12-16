 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">
    <div class="footer-top text-center">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
              <img src="{{ asset('front/img/images/header-logo.png')}}" alt="">
              <h3 class="text-white text-center fw-bold">SEKOLAH KARAKTER 24</h3>
            <p class="text-white">IKUTI KAMI MELALUI</p>
            <div class="social-links mt-3">
              <a href="https://www.tiktok.com/@sdm24ketintang" class="twitter"><i class="bi bi-tiktok"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/sdm24ketintang/?hl=id" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-sm-12 footer-links text-md-start">
            <h4>Navigasi</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="{{ route('index') }}">Beranda</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{ route('profil') }}">Profil</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{ route('kurikulum') }}">Kurikulum</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{ route('berita') }}">Berita</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="{{ route('ppdb') }}">PPDB</a></li>
            </ul>
          </div>

          {{-- <div class="container">
            <h3>24 NEWS</h3>
            <img src="{{ asset('front/img/images/image-5.jpg')}}" class="gambarf" alt="">
              <p><a href="#">Mengenal aneka ragam binatang di KBS</a></p>
              <div class="meta">
                <a href="#"><span class="icon-calendar"></span> Oct 6, 2023</a>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
          </div> --}}

          <div class="col-lg-5 col-md-12 footer-contact text-center text-white text-md-start">
            <h4>Layanan Informasi</h4>
            <p class="text-white">
                <strong>Alamat:</strong><br/>
                Jl. Ketintang No.45 Surabaya Jawa Timur
            </p>
            <p class="text-white">
                <strong>Hubungi kami:</strong><br/>+6231 827 4477
            </p>
            <p class="text-white">
                <strong>Email:</strong><br/>sdmuhammadiyah24sby@gmail.com
            </p>

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{ date('Y', strtotime(now())) }}</span></strong>. All Rights Reserved <br>
        Made with <span class="bi bi-heart"></span> by Youthms.id
      </div>
    </div>
  </footer><!-- End Footer -->
