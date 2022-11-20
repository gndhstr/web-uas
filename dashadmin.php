<?php
include "koneksi.php";
include "lib/function.php";

$result_dosen = get_all("SELECT * FROM dosen");

$result_matkul = get_all("SELECT * FROM matkul ORDER BY jadwal_matkul");

$data_akun = get_all("SELECT * FROM login WHERE NOT jabatan='admin'");

if (isset($_GET['cari_mk'])) {
  $cari_mk = $_GET['cari_mk'];
  $result_matkul = get_all("SELECT * FROM matkul 
  WHERE nama_matkul LIKE '%$cari_mk%'
  OR kode_matkul LIKE '%$cari_mk%'
  OR dosen_nama_dosen LIKE '%$cari_mk%'");
}

if (isset($_GET['cari_ds'])) {
  $cari_ds = $_GET['cari_ds'];
  $result_dosen = get_all("SELECT * FROM dosen 
  WHERE nip LIKE '%$cari_ds%'
  OR nama_dosen LIKE '%$cari_ds%'");
}

if (isset($_GET['hari_ini'])) {
  $waktu =  date("Y-m-d");
  $result_matkul = mysqli_query($koneksi, "SELECT * FROM matkul WHERE jadwal_matkul='$waktu' ORDER BY jadwal_matkul");
}

if (isset($_GET['cari_akun'])) {
  $cari_akun = $_GET['cari_akun'];
  $data_akun = get_all("SELECT * FROM login
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
                <input type="submit" class="btn btn-primary rounded" value="Tampilkan hari ini" name="hari_ini" />
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
            <?php foreach ($result_matkul as $index => $data_matkul) : ?>
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
    <div class="card">
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
            <?php foreach ($result_dosen as $index => $data_dosen) : ?>
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
    <div class="card">
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
            <?php foreach ($data_akun as $index => $akun) : ?>
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
        <a href="form/tambahakun.php" class="btn btn-success m-3">Tambah Akun Tenaga Kependidikan</a>
      </div>
    </div>
  </div>
</section><!-- End About Section -->
