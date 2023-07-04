<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nobp = $_POST['nobp'];
    $password = $_POST['password'];

    $query = "SELECT * FROM siswa WHERE nobp = '$nobp'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['nobp'] = $nobp;
            header('Location: landingpage.php');
            exit;
        }else {
            header('Location: index.php?status=unregistered');
            exit;
        }
    } else {
        header('Location: index.php?status=unregistered');
        exit;
    }
}
?>
