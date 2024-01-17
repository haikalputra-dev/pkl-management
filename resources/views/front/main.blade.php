<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PKL Politeknik Sukabumi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="front/assets/img/favicon.png" rel="icon">
  <link href="front/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="front/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="front/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="front/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="">direktorat@polteksmi.ac.id</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 266 215417</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://www.facebook.com/polikami/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/politeknik_sukabumi/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCFuCMsptiQaDoQJkWghWZKg/" class="youtube"><i class="bi bi-youtube"></i></i></a>
      </div>
    </div>
  </section>
  @include('sweetalert::alert')
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html"><span>PKL</span> Politeknik Sukabumi</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Galeri</a></li>
          <li><a class="nav-link scrollto" href="#team">Tim Aktif</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">Alumni</a></li>
          <li><a class="nav-link scrollto" href="#clients">Instansi</a></li>
          <li><a class="nav-link scrollto" href="#contact">Daftar Sekarang</a></li>
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          {{-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Selamat <span>Datang</span></h1>
      <h2>di Website Sistem PKL Politeknik Sukabumi</h2>
      <div class="d-flex">
        <a href="{{ route('login') }}" class="btn-get-started scrollto">Login</a>
        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>Galeri</h2>
              <h3>Galeri <span>Kegiatan</span></h3>
              <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
            </div>
    
            <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="col-lg-12 d-flex justify-content-center">
                {{-- <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-app">App</li>
                  <li data-filter=".filter-card">Card</li>
                  <li data-filter=".filter-web">Web</li>
                </ul> --}}
              </div>
            </div>
    
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="/front/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 1</h4>
                  <p>App</p>
                  <a href="/front/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="/front/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <a href="/front/assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="/front/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 2</h4>
                  <p>App</p>
                  <a href="/front/assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="/front/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 2</h4>
                  <p>Card</p>
                  <a href="/front/assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="/front/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 2</h4>
                  <p>Web</p>
                  <a href="/front/assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="/front/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 3</h4>
                  <p>App</p>
                  <a href="/front/assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="/front/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 1</h4>
                  <p>Card</p>
                  <a href="/front/assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="/front/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 3</h4>
                  <p>Card</p>
                  <a href="/front/assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="/front/assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <a href="/front/assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
            </div>
    
          </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>Tim Aktif</h2>
              <h3>Tim PKL yang sedang <span>Aktif</span></h3>
              <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
            </div>
    
            <div class="row">
    
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                  <div class="member-img">
                    <img src="/front/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                    <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                  <div class="member-info">
                    <h4>Walter White</h4>
                    <span>Chief Executive Officer</span>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="member">
                  <div class="member-img">
                    <img src="/front/assets/img/team/team-2.jpg" class="img-fluid" alt="">
                    <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                  <div class="member-info">
                    <h4>Sarah Jhonson</h4>
                    <span>Product Manager</span>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="member">
                  <div class="member-img">
                    <img src="/front/assets/img/team/team-3.jpg" class="img-fluid" alt="">
                    <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                  <div class="member-info">
                    <h4>William Anderson</h4>
                    <span>CTO</span>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                <div class="member">
                  <div class="member-img">
                    <img src="/front/assets/img/team/team-4.jpg" class="img-fluid" alt="">
                    <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                  <div class="member-info">
                    <h4>Amanda Jepson</h4>
                    <span>Accountant</span>
                  </div>
                </div>
              </div>
    
            </div>
    
          </div>
        </section><!-- End Team Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          {{-- <h2>Total Siswa</h2> --}}
          <h3>Total Siswa</h3>
          <p>Total Siswa yang <span>pernah melakukan</span> PKL di Politeknik Sukabumi dan siswa yang <span>sedang aktif </span>PKL di Politeknik Sukabumi</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Total Alumni</p>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Total Instansi Terdaftar</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Total Siswa Aktif</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">
          <div class="section-title">
            <h3 class="text-white">Alumni Kami</h3>
            <p class="text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur at quaerat incidunt eius placeat, quasi iste expedita hic blanditiis, animi laboriosam commodi mollitia totam modi eum, voluptas omnis sequi eveniet.</p>
          </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/front/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/front/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/front/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/front/assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/front/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container" data-aos="zoom-in">

        <div class="section-title">
          {{-- <h2>Total Siswa</h2> --}}
          <h3>Instansi</h3>
          <p>Instansi yang pernah mendaftar </span>PKL di Politeknik Sukabumi</p>
        </div>

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mb-3">
            <img src="/front/assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Daftar PKL</h2>
          <h3><span>Hubungi Kami</span></h3>
          <p>Ajukan pembuatan Akun kepada kami agar bisa mendaftarkan tim PKL ke Politeknik Sukabumi</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p>Jl. Babakan Sirna No.25, Benteng, Kec. Warudoyong, Kota Sukabumi, Jawa Barat 43132</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>direktorat@polteksmi.ac.id</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Telpon</h3>
              <p>+62 266 215417</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.6556723478366!2d106.90927032242453!3d-6.918512474679119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e684829c6dffdd5%3A0xecbbf1784114f3d8!2sPoliteknik%20Sukabumi!5e0!3m2!1sid!2sid!4v1700578358523!5m2!1sid!2sid" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6">
            <form action="{{ route('daftarInstansi') }}" method="POST" style="box-shadow: 0 0 30px rgba(214, 215, 216, 0.4);
            padding: 30px;">
              @csrf
              <div class="row">
                <div class="col form-group" style="margin-bottom: 20px;">
                  <input type="text" name="username" class="form-control" id="name" placeholder="Username" required style="border-radius: 0; box-shadow: none;font-size: 14px;" >
                </div>
                <div class="col form-group" style="margin-bottom: 20px;">
                  <input type="password" name="password" class="form-control" id="name" placeholder="Password" required style="border-radius: 0; box-shadow: none;font-size: 14px;" >
                </div>
                <div class="col form-group" style="margin-bottom: 20px;">
                  <input type="email" name="email" class="form-control" id="name" placeholder="Email" required style="border-radius: 0; box-shadow: none;font-size: 14px;" >
                </div>
                <hr>
                <div class="col form-group" style="margin-bottom: 20px;">
                  <input type="text" name="nama_instansi" class="form-control" id="name" placeholder="Nama Instansi" required style="border-radius: 0; box-shadow: none;font-size: 14px;" >
                </div>
                <div class="col form-group" style="margin-bottom: 20px;">
                  <input type="text" class="form-control" name="npsn" id="email" placeholder="NPSN" required style="border-radius: 0; box-shadow: none;font-size: 14px;" >
                </div>
              </div>
              <div class="form-group" style="margin-bottom: 20px;">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_sekolah" id="inlineRadio1" value="option1">
                  <label class="form-check-label" for="inlineRadio1">Negeri</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_sekolah" id="inlineRadio2" value="option2">
                  <label class="form-check-label" for="inlineRadio2">Swasta</label>
                </div>
              </div>
              <div class="form-group" style="margin-bottom: 20px;">
                <input type="number" class="form-control" name="telepon" id="subject" placeholder="Telepon" required style="border-radius: 0; box-shadow: none;font-size: 14px;" >
              </div>
              <div class="form-group" style="margin-bottom: 20px;">
                <textarea class="form-control" name="alamat" rows="4" placeholder="Alamat" required style="border-radius: 0; box-shadow: none; font-size:14px;" ></textarea>
              </div>
              <div class="text-center">
                <button type="submit" style="  background: #106eea;
                border: 0;
                padding: 10px 30px;
                color: #fff;
                border-radius: 4px;">Daftar</button>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="front/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="front/assets/vendor/aos/aos.js"></script>
  <script src="front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="front/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="front/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="front/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="front/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="front/assets/js/main.js"></script>

</body>

</html>