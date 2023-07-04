<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $matakuliah = $_POST['matakuliah'];

    $query = "INSERT INTO jadwal (hari, jam, matakuliah) VALUES ('$hari', '$jam', '$matakuliah')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data jadwal matakuliah berhasil disimpan.";
    } else {
        echo "Gagal menyimpan data jadwal matakuliah.";
    }
}
?>
