<?php

include "../koneksi.php";

$id = $_GET['id'];
var_dump($_GET['id']);
if (isset($id)){
    mysqli_query($koneksi,"DELETE FROM login WHERE id_login ='$id'");
    header("Location: ../index.php");
  }
?>
