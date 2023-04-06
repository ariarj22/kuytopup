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

      <nav id="navbar" class="navbar">
        <ul>
        <li><a href="/"class="active">Home</a></li>
          <li><a href="/about" >About</a></li>
          <li><a href="/contact" >Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade" data-aos-delay="1500">
  <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
          <h2>{{ $game }}</h2>
          </div>
        </div>
      </div>
    </div><!-- End Page Header -->
    <form method="POST" action="/pembayaran/{{ $id }}/edit/submit">
        @csrf
        @method('PUT')
    <!-- ======= Services Section ======= -->
        <section id="services" class="services">
        <div class="container">
            <div class="row gy-4">
                @foreach($products as $product)
                <div class="form-check col-xl-3 col-md-6 d-flex">
                    <input class="form-check-input" type="radio" name="product" id="flexRadioDefault{{ $product['id'] }}" value="{{ $product['id'] }}">
                    <label class="form-check-label service-item position-relative flex-fill" for="flexRadioDefault{{ $product['id'] }}">
                        <div class="">
                            <img src="{{ asset($product['image_url']) }}" width="50px" class="bi bi-activity">
                            <h4>{{ $product['type'] }}</h4>
                            <p>{{ 'Rp ' . number_format($product['price'], 0, ',', '.') }}</p>
                        </div>
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        </section><!-- End Services Section -->


    <!-- <div class="service-item position-relative">
                <img src="{{ asset($product['image_url']) }}" width="50px" class="bi bi-activity">
                <h4><a href="#" class="stretched-link">{{ $product['type'] }}</a></h4>
                <p>{{ 'Rp ' . number_format($product['price'], 0, ',', '.') }}</p>
                </div> -->
        <div class="page-headerr d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
            <h2>Input Informasi</h2>
            </div>
            </div>
        </div>
        </div>

        <section id="contact" class="contact">
        <div class="container">

            <div class="row justify-content-center mt-4">

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6 form-group">
                    <input type="number" name="uid" class="form-control" id="uid" placeholder="UID" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Nomor HP" required>
                </div>
                <div class="my-3">
                    <div class="error-message"></div>
                    @error('product')
                        <div class="error-message">Silakan pilih produk yang anda inginkan terlebih dahulu!</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Order!</button>
                </div>
            </div><!-- End Contact Form -->

            </div>

        </div>
        </section><!-- End Contact Section -->
    </form>
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