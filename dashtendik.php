<?php
include "koneksi.php";

$result_dosen = mysqli_query($koneksi, "SELECT * FROM dosen");

$result_matkul = mysqli_query($koneksi, "SELECT * FROM matkul");

if (isset($_GET['cari_mk'])) {
  $cari_mk = $_GET['cari_mk'];
  $result_matkul = mysqli_query($koneksi, "SELECT * FROM matkul 
  WHERE nama_matkul LIKE '%$cari_mk%'
  OR kode_matkul LIKE '%$cari_mk%'
  OR dosen_nama_dosen LIKE '%$cari_mk%'");
}

if (isset($_GET['cari_ds'])) {
  $cari_ds = $_GET['cari_ds'];
  $result_dosen = mysqli_query($koneksi, "SELECT * FROM dosen 
  WHERE nip LIKE '%$cari_ds%'
  OR nama_dosen LIKE '%$cari_ds%'");
}
?>
<section id="about" class="about">
  <div class="container">

    <!--MDB Tables-->
    <div class="card mb-4">
      <div class="card-body">
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <div id="Matkul" class="col-md-12">
            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Data Mata Kuliah</h2>
            <form action="index.php" method="GET">
              <div class="input-group">
                <input type="text" class="form-control rounded" placeholder="Search" name="cari_mk" />
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
              <th>Kode Matkul</th>
              <th>Mata Kuliah</th>
              <th>Jadwal</th>
              <th>Dosen Pengampu</th>
            </tr>
          </thead>
          <!--Table head-->
          <!--Table body-->
          <tbody>
            <?php foreach (mysqli_fetch_all($result_matkul) as $index => $data_matkul): ?>
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
            </tr>
            <?php endforeach; ?>
          </tbody>
          <!--Table body-->
        </table>
        <a href="form/tambahmatkul.php" class="btn btn-success m-3">Tambah Mata Kuliah</a>
        <!--Table-->
      </div>

    </div>

    <div class="card">

      <div class="card-body">
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <div id="Dosen" class="col-md-12">
            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Data Dosen</h2>
            <form action="index.php" method="GET">
              <div class="input-group">
                <input type="text" class="form-control rounded" placeholder="Search" name="cari_ds" />
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
            </tr>
          </thead>
          <!--Table head-->
          <!--Table body-->
          <tbody>
            <?php foreach (mysqli_fetch_all($result_dosen) as $index => $data_dosen): ?>
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
            </tr>
            <?php endforeach; ?>
          </tbody>
          <!--Table body-->
        </table>
        <!--Table-->
        <a href="form/tambahdosen.php" class="btn btn-success m-3">Tambah Data Dosen</a>
      </div>
    </div>

  </div>
</section><!-- End About Section -->