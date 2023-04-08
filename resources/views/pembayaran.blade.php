<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KuyTopup</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/Hu-Tao-2.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/img/Hu-Tao-2.png') }}" alt="">
        <!-- <i class="bi bi-camera"></i> -->
        <h1>KuyTopup</h1>
      </a>

      <!-- <nav id="navbar" class="navbar">
        <ul>
        <li><a href="/">Home</a></li>
          <li><a href="/about" >About</a></li>
          <li><a href="/contact" >Contact</a></li>
          <li><a href="/pembayaran" class="active" >Pembayaran</a></li>
        </ul>
      </nav>.navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
        <h2>KuyBayar</h2>
        </div>
      </div>
    </div>
  </div><!-- End Page Header -->

  <main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-header">
          <h2>ID Pembayaran {{ $id }}</h2>
          <p>Item yang dipilih</p>
        </div>

        <div class="row gy-4 gx-lg-5">

          <div class="col-lg-6">
            <div class="pricing-item d-flex justify-content-between">
              <h3>{{ $product . ' ' . $game }}</h3>
              <h4>{{ 'Rp ' . number_format($price, 0, ',', '.') }}</h4>
            </div>
          </div><!-- End Pricing Item -->
          <div class="col-lg-6">
            <a href="/pembayaran/{{ $id }}/edit" class="btn btn-primary">Ubah Pesanan</a>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Batalkan Pesanan</button>
          </div>
    </section>

<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
      <div class="row d-flex justify-content-center">
          <div class="col-lg-5 content ">
            <h2 class="text-center">
                KuyTopup PT
            </h2>
            <p class="fst-italic py-3">
              Pastikan melakukan pembayaran dengan nama di atas ya, Gamers!
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Dana:</strong> <span>08123456789</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Gopay:</strong> <span>08123456789</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Ovo:</strong> <span>08123456789</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>BCA:</strong> <span>4329832</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Mandiri:</strong> <span>4292483</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>BNI:</strong> <span>4338839</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Genius:</strong> <span>2323098</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>MayBank:</strong> <span>3239339</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <div class="page-headerr d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
          <h2>Terimakasih sudah mampir ya, Gamers!</h2>
          </div>
        </div>
      </div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>KuyTopup</span></strong>, 2023. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/ -->
        Designed by <a href="https://www.youtube.com/watch?v=BBJa32lCaaY">Kelompok 3</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modal-saya">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Apa kamu yakin?</h1>
        </div>
        <div class="modal-footer modal-saya">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <form method="POST" action="/pembayaran/{{ $id }}/cancel">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ya</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  
</body>

</html>