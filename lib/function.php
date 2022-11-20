<?php

include "../koneksi.php";

function query($query) {
  global $koneksi;
  return mysqli_query($koneksi, $query);
}

function get_all($query): array | bool{
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  return mysqli_fetch_all($result);
}

function get($query): array | bool{
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  return mysqli_fetch_assoc($result);
}
