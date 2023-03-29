<?php
include "koneksi.php";

$result_dosen = mysqli_query($koneksi, "SELECT * FROM dosen");

$result_matkul = mysqli_query($koneksi, "SELECT * FROM matkul ORDER BY jadwal_matkul");

$data_akun = mysqli_query ($koneksi, "SELECT * FROM login WHERE NOT jabatan='admin'");

if (isset($_GET['cari_mk'])) {
  $cari_mk = $_GET['cari_mk'];
  $result_matkul = mysqli_query ($koneksi,"SELECT * FROM matkul 
  WHERE nama_matkul LIKE '%$cari_mk%'
  OR kode_matkul LIKE '%$cari_mk%'
  OR dosen_nama_dosen LIKE '%$cari_mk%'");
}

if (isset($_GET['cari_ds'])) {
  $cari_ds = $_GET['cari_ds'];
  $result_dosen = mysqli_query ($koneksi,"SELECT * FROM dosen 
  WHERE nip LIKE '%$cari_ds%'
  OR nama_dosen LIKE '%$cari_ds%'");
}

if (isset($_GET['tampilan']) && $_GET['tampilan'] == "hari_ini") {
  $waktu =  date("Y-m-d");
  $result_matkul = mysqli_query ($koneksi,"SELECT * FROM matkul WHERE jadwal_matkul='$waktu' ORDER BY jadwal_matkul");
  // echo($result_matkul);
}
if (isset($_GET['tampilan']) && $_GET['tampilan'] == "bulan_ini") {
  $waktu =  date("Y-m");
  $result_matkul = mysqli_query ($koneksi,"SELECT * FROM matkul WHERE jadwal_matkul LIKE '%$waktu%' ORDER BY jadwal_matkul");
  // echo($result_matkul);
}
if (isset($_GET['tampilan']) && $_GET['tampilan'] == "tahun_ini") {
  $waktu =  date("Y");
  $result_matkul = mysqli_query ($koneksi,"SELECT * FROM matkul WHERE jadwal_matkul LIKE '%$waktu%' ORDER BY jadwal_matkul");
  // echo($result_matkul);
}

if (isset($_GET['cari_akun'])) {
  $cari_akun = $_GET['cari_akun'];
  $data_akun = mysqli_query ($koneksi,"SELECT * FROM login
    WHERE NOT jabatan='admin'
    AND nama LIKE '%$cari_akun%'
    AND username LIKE '%$cari_akun%'
    ");
  
}
?>
<section id="about" class="about">
  <div class="container">

    <!-- TABLE MATKUl-->
    <div class="card mb-4">
      <div class="card-body">
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-12">
            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Mata Kuliah</h2>
            <form action="index.php" method="GET">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="cari_mk" />
                <button type="submit" class="btn btn-outline-primary mr-1 ">search</button>
                <!-- <input type="submit" class="btn btn-primary rounded" value="Jadwal Hari Ini" name="hari_ini" /> -->
                <!-- <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Tampilkan Matkul
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" name="hari_ini">Hari ini</a>
                  <a class="dropdown-item" name="bulan_ini">Bulan ini</a>
                  <a class="dropdown-item" name="tahun_ini">Tahun ini</a>
                </div> -->
                <div class="btn-group">
                  <button type="button" class="btn btn-primary"><?php if (isset($_GET['tampilan']) && $_GET['tampilan'] != '') {
                    echo ($_GET['tampilan']);
                  }
                  else {
                    echo ("Tampilkan Berdasarkan");
                  } ?>
                  </button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only"></span>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="./index.php?tampilan=hari_ini">Hari ini</a>
                    <a class="dropdown-item" href="./index.php?tampilan=bulan_ini">Bulan ini</a>
                    <a class="dropdown-item" href="./index.php?tampilan=tahun_ini">Tahun ini</a>
                  </div>
                </div>
              </div>
              </div>
            </form>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
        <!--Table-->
        <table class="table table-striped">
          <!--Table head-->
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Matkul</th>
              <th>Mata Kuliah</th>
              <th>Jadwal</th>
              <th>Dosen Pengampu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <!--Table head-->
          <!--Table body-->
          <tbody>
            <?php foreach (mysqli_fetch_all($result_matkul) as $index => $data_matkul) : ?>
              <tr>
                <th scope="row">
                  <?= $index + 1 ?>
                </th>
                <td>
                  <?= $data_matkul[0]; ?>
                </td>
                <td>
                  <?= $data_matkul[1]; ?>
                </td>
                <td>
                  <?= $data_matkul[2]; ?>
                </td>
                <td>
                  <?= $data_matkul[3]; ?>
                </td>
                <td>
                  <a href="form/ubahmatkul.php?kode=<?= $data_matkul[0]; ?>" class="btn btn-primary ">Update</a>
                  <a href="delete/matkul.php?kode=<?= $data_matkul[0]; ?>" class="btn btn-danger ">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <!--Table body-->
        </table>
        <!--Table-->
      </div>
    </div>

    <!-- Table Dosen -->
    <div class="card mb-4">
      <div class="card-body">
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-12">
            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Dosen Pengampu</h2>
            <form action="index.php" method="GET">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="cari_ds" />
                <button type="submit" class="btn btn-outline-primary">search</button>
              </div>
            </form>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
        <!--Table-->
        <table class="table table-striped">
          <!--Table head-->
          <thead>
            <tr>
              <th>No</th>
              <th>Nip Dosen</th>
              <th>Nama Dosen</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <!--Table head-->
          <!--Table body-->
          <tbody>
            <?php foreach (mysqli_fetch_all($result_dosen) as $index => $data_dosen) : ?>
              <tr>
                <th scope="row">
                  <?= $index + 1 ?>
                </th>
                <td>
                  <?= $data_dosen[0]; ?>
                </td>
                <td>
                  <?= $data_dosen[1]; ?>
                </td>
                <td>
                  <a href="form/ubahdosen.php?nip=<?= $data_dosen[0]; ?>" class="btn btn-primary ">Update</a>
                  <a href="delete/dosen.php?nip=<?= $data_dosen[0]; ?>" class="btn btn-danger ">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <!--Table body-->
        </table>
        <!--Table-->
      </div>
    </div>

    <!-- Table Akun -->
    <div class="card mb-4">
      <div class="card-body">
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-12">
            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Akun Tenaga Kependidikan</h2>
            <form action="index.php" method="GET">
              <div class="input-group">
                <input type="text" class="form-control " placeholder="Search" name="cari_akun" />
                <button type="submit" class="btn btn-outline-primary">search</button>
              </div>
            </form>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
        <!--Table-->
        <table class="table table-striped">
          <!--Table head-->
          <thead>
            <tr>
              <th>ID Login</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <!--Table head-->
          <!--Table body-->
          <tbody>
            <?php foreach (mysqli_fetch_all($data_akun) as $index => $akun) : ?>
              <tr>
                <th scope="row">
                  <?= $akun[0]; ?>
                </th>
                <td width="40%">
                  <?= $akun[1]; ?>
                </td>
                <td width="20%">
                  <?= $akun[2]; ?>
                </td>
                <td>
                  <a href="form/ubahakun.php?id=<?= $akun[0]; ?>" class="btn btn-primary ">Update</a>
                  <a href="delete/akun.php?id=<?= $akun[0]; ?>" class="btn btn-danger ">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <!--Table body-->
        </table>
        <!--Table-->
        <a href="form/tambahakun.php" class="btn btn-success m-3">Tambah Akun</a>
      </div>
    </div>
  </div>
</section><!-- End About Section -->
