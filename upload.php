<?php
include "koneksi.php";

$foto = $_FILES['foto']['name'];
$file_tmp = $_FILES['foto']['tmp_name'];
$nama = $_POST['nama'];
$nobp = $_POST['nobp'];
$password = $_POST['password'];

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

move_uploaded_file($file_tmp, 'file/' . $foto);

$query = "INSERT INTO siswa SET 
            nama = '$nama',
            nobp = '$nobp',
            password = '$hashedPassword',
            foto = '$foto'";
            
mysqli_query($koneksi, $query) or die("SQL Error " . mysqli_error());

header('location:viewuser.php');
?>
