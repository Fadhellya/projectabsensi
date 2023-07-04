<!DOCTYPE html>
<html>
<head>
    <title>View User</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-12 row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="col-md-12 mt-4">
                    <h2>View User</h2>
                </div>
                <div class="col-md-12 mt-4">
                    <a href="register.php" class="btn btn-success mb-4">Register</a>
                    <?php
                    include "koneksi.php";
                    $data = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id_siswa DESC");
                    while ($row = mysqli_fetch_array($data)) {
                        ?>
                        <div class="col-md-12 row mb-5">
                            <div class="col-md-3">
                                <img src="file/<?php echo $row['foto']; ?>" style="width: 100%;">
                            </div>
                            <div class="col-md-9">
                                <h2><?php echo $row['nama']; ?></h2>
                                <h2><?php echo $row['nobp']; ?></h2>
                                <h2><?php echo $row['password']; ?></h2>
                                <a href="delete.php?id=<?php echo $row['id_siswa']; ?>" class="btn btn-danger mt-4">Delete</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
