<?php

include "../koneksi.php";

$nip = $_GET['nip'];

if (isset($nip)) {
  $query = "DELETE FROM dosen WHERE nip='$nip'";
  // mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS=OFF;");
  $result = mysqli_query($koneksi, $query);
  // mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS=ON;");

  if ($result) {
    header("Location: ../index.php");
  }
}
