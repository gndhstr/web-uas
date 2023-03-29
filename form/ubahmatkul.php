<?php
session_start();
include "../koneksi.php";

if ($_SESSION['jabatan'] != "admin") {
  header("Location: ../index.php");
}

$kode_lama = $_GET['kode'];

if (isset($kode_lama)) {
  $result = mysqli_query($koneksi,"SELECT * FROM matkul WHERE kode_matkul='$kode_lama'");
  $result = $result -> fetch_assoc();
  $nama_dosen = $result['dosen_nama_dosen'];
  // var_dump($nama_dosen);
  // var_dump($result);
  // die;
  $data_dosen = mysqli_query($koneksi,"SELECT * FROM dosen WHERE NOT nama_dosen='$nama_dosen'");
  $data_dosen = $data_dosen -> fetch_all();
} else {
  header("Location: ../index.php");
}

if (isset($_POST['Ubah'])) {

  $kode = $_POST['kode'];
  $nama_dosen = $_POST['dosen'];
  $nama_matkul = $_POST['matkul'];
  $jadwal = $_POST['jadwal'];
  $id = $result['login_id_login'];


  $query = "UPDATE matkul SET

  kode_matkul = '$kode',
  nama_matkul = '$nama_matkul',
  jadwal_matkul = '$jadwal',
  dosen_nama_dosen = '$nama_dosen',
  login_id_login = $id

  WHERE kode_matkul = '$kode_lama'";
  // var_dump($query);
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header("Location: ../index.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ubah Data Mata Kuliah - ABC University</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/abc.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <style>
    <?php include "../assets/css/style.css" ?>
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
        <h1><a href="index.html">ABC <span>UNIVERSITY</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="../index.php">Kembali</a></li>
          <li>
          <a class="nav-link" href="">
            <?= $_SESSION['nama']; ?> <i class="bi bi-person-fill text-danger mx-2"></i>
          </a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- Section: Design Block -->
    <section class="">
      <!-- Jumbotron -->
      <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: white">
        <div class="container">
          <div class="row gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <h1 class="my-5 display-3 fw-bold ls-tight">
                Ubah Data<br />
                <span class="coler">Mata Kuliah</span>
              </h1>
              <p style="color: hsl(217, 10%, 50.8%)">
                Ubah data mata kuliah universitas ABC
              </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
              <div class="card">
                <div class="card-body py-5 px-md-5">
                  <form action="ubahmatkul.php?kode=<?= $kode_lama; ?>" method="post">

                    <h3>Ubah Data</h3>
                    <br>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="text" id="form3Example3" class="form-control" name="kode" value="<?= $result['kode_matkul']; ?>" required/>
                      <label class="form-label" for="form3Example3">Kode Matkul</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="text" id="form3Example4" class="form-control" name="matkul" value="<?= $result['nama_matkul']; ?>" required/>
                      <label class="form-label" for="form3Example4">Mata Kuliah</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="date" id="form3Example4" class="form-control" name="jadwal" value="<?= $result['jadwal_matkul']; ?>" required/>
                      <label class="form-label" for="form3Example4">Jadwal</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <select class="form-select" aria-label="Default select example" name="dosen">
                        <option>Pilih Dosen Pengampu</option>
                        <option selected><?= $result['dosen_nama_dosen'] ?></option>
                        <?php foreach ($data_dosen as $dosen) :  ?>
                          <option value="<?= $dosen[1] ?>"><?= $dosen[1]; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <label class="form-label" for="form3Example4">Dosen Pengampu</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn bgcoler btn-block mb-4" name="Ubah">
                      Ubah Data
                    </button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

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
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
