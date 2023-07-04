<?php
include "koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = '$_GET[id]'");
$row = mysqli_fetch_array($data);

$foto = $row['foto'];
if (file_exists('file/' . $foto)) {
    unlink('file/' . $foto);
}

$query = "DELETE FROM siswa WHERE id_siswa = '$_GET[id]'";
mysqli_query($koneksi, $query) or die("SQL Error " . mysqli_error());

header('location:viewuser.php');
?>
