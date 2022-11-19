<?php
$koneksi = mysqli_connect ("localhost","root","","uas");

// check koneksi

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : ".mysqli_connect_errno();
}

?>