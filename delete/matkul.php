<?php

include "../koneksi.php";

$kode = $_GET['kode'];

if (isset($kode)) {
  mysqli_query($koneksi, "DELETE FROM matkul WHERE kode_matkul='$kode'");
  header("Location: ../index.php");
}
