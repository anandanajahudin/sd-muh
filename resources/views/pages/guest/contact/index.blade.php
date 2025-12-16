@extends('layout.guest.main')
@section('content-title', 'Kontak')

@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact-page" class="contact-page">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Contact</h2>
                <p>KONTAK <span class="cus">KAMI</span></p>
            </header>
            <div class="row gy-4">
                @foreach ($profil as $profil)
                    <div class="col-lg-7">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fas fa-map-marker-alt"></i> <b>Alamat</b></span>
                                        </div>
                                        <p>{{ $profil->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fas fa-phone"></i> <b>Nomor Telepon</b></span>
                                        </div>
                                        <p>+{{ $profil->telp }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fas fa-clock"></i> <b>Jam Operasional</b></span>
                                        </div>
                                        <p class="lh-lg">{{ $profil->operasional }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fas fa-envelope"></i> <b>E-Mail</b></span>
                                        </div>
                                        <p>{{ $profil->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <p><i class="fas fa-map-marker-alt"></i> <b>Lokasi Kami</b></p>
                            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 150px">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.405043384314!2d112.72622349999999!3d-7.3083106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7808dc2965%3A0xfaa47b5206776fec!2sJl.%20Ketintang%20No.45%2C%20Wonokromo%2C%20Kec.%20Gayungan%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060243!5e0!3m2!1sid!2sid!4v1683245933871!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-contact col-lg-12">
                <header class="section-header">
                    <p>INGIN BERKONSULTASI <span class="cus"> DENGAN KAMI ?</span></p>
                    <h2 style="margin-top: 15px;">
                        Kami siap memberikan yang terbaik bagi anak dari Ayah Bunda. Apabila ada
                        yang ingin ditanyakan dan disampaikan, kami siap membantu.</h2>
                </header>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" autofocus data-bs-dismiss="alert" aria-label="Close"><i class="ti-close"></i></button>
                    </div>
                @endif
                <form action="{{ route('kontak.storePesanKontak') }}" class="php-email-form"
                      style="background-color: #9CF0B9; border-radius:25px" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pesan row gy-4 mt-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Lengkap Anda" required>
                        </div>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" oninput="phoneNumbers(this.value)" placeholder="08xxxxxx" required>
                        </div>
                        <div class="col-md-12">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="E-Mail Anda" required>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" id="pesan" rows="6" placeholder="Pesan Anda" required></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" style="border-radius: 15px">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section><!-- End Contact Section -->
@endsection

@push('scripts')
    <script>
        function phoneNumbers(text) {
            text = text.replace(/[^0-9]/g, '');
            var inputResult = document.getElementById('telp');
            inputResult.value = text;
        }
    </script>
@endpush
