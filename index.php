<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['jabatan'])) {
  header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Proyek Akhir - Kasus 3</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <style>
    <?php include "assets/css/style.css" ?>
  </style>

  <!-- =======================================================
  * Template Name: MyBiz - v4.9.1
  * Template URL: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="#">ABC <span>UNIVERSITY</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="session/logout.php">Logout</a></li>
          <li></li>
          <li>
            <a class="nav-link" href="">
              <?php if ($_SESSION['jabatan'] == "admin"): ?>
                <?= $_SESSION['nama']; ?> <i class="bi bi-person-fill text-danger mx-2"></i>
                <?php else: ?>
                <?= $_SESSION['nama']; ?> <i class="bi bi-person-fill text-success mx-2"></i>
                  <?php endif; ?>
            </a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">ABC <span>UNIVERSITY</span></h2>
                <p class="animate__animated animate__fadeInUp">Universitas ABC adalah salah satu Perguruan Tinggi Negeri
                  di Indonesia. Universitas ABC merupakan salah satu perguruan tinggi terbaik. Kampus utamanya terletak
                  di jauh sana</p>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">PHP</h2>
                <p class="animate__animated animate__fadeInUp">PHP: Hypertext Preprocessor atau hanya PHP saja, adalah
                  bahasa skrip dengan fungsi umum yang terutama digunakan untuk pengembangan web. Bahasa ini awalnya
                  dibuat oleh seorang pemrogram Denmark-Kanada Rasmus Lerdorf pada tahun 1994.</p>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">MySQL</h2>
                <p class="animate__animated animate__fadeInUp">MySQL adalah sebuah perangkat lunak sistem manajemen
                  basis
                  data SQL atau DBMS yang multialur, multipengguna, dengan sekitar 6 juta instalasi di seluruh dunia.
                </p>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Dashboard Section ======= -->

    <!--MDB Tables-->
    <?php
    if ($_SESSION['jabatan'] == "admin") {
      include "dashadmin.php";
    } else {
      include "dashtendik.php";
    }
    ?>

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <span>Team</span>
          <h2>Team</h2>
          <p>Perkenalkan Kami</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img
                  src="https://media.discordapp.net/attachments/968176593547702322/1026405915534037043/IMG-20210606-WA0000.jpg?width=460&height=460"
                  class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Bimo Alam Syah</h4>
                <span>Mahasiswa</span>
                <p>NIM : 5302421076</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img
                  src="https://cdn.discordapp.com/attachments/875383813411311627/1043561796524593243/xubw7q.jpg"
                  class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Gandhi Satria Mukti</h4>
                <span>Mahasiswa</span>
                <p>NIM : 5302421071</p>
                <div class="social">
                  <a href="https://github.com/gndhstr"><i class="ri-github-fill"></i></a>
                  <a href="https://www.instagram.com/gndhstr/"><i class="ri-instagram-fill"></i></a>
                  <a href="www.linkedin.com/in/gndhstr"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Azzahra Fadhila Fakhrunnisa</h4>
                <span>Mahasiswa</span>
                <p>NIM : 5302421066</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Lazzuardi Anwar Zidni</h4>
                <span>Mahasiswa</span>
                <p>NIM : 5302421074</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Dossen Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container position-relative">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="https://cdn.discordapp.com/attachments/875383813411311627/1042824944549122069/PakRiska_1.jpeg"
                  class="testimonial-img" alt="">
                <h3>Riska Dami Ristanto, S.Pd., M.Pd.</h3>
                <h4>Dosen Pengampu</h4>
                <p>
                  Pemrograman WEB
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img
                  src="https://cdn.discordapp.com/attachments/875383813411311627/1042824944343580803/Pak_Febry_1.jpeg"
                  class="testimonial-img" alt="">
                <h3>Febry Putra Rochim, S.T., M.Eng.</h3>
                <h4>Dosen Pengampu</h4>
                <p>
                  Pemrograman WEB
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Kelompok 3</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/ -->
        Supported by <a href="https://github.com/yusrilarzaqi/" target="_blank">Yusril Arzaqi</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>