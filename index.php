<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-12 row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="col-md-12 text-center">
                    <h2>Menu Login</h2>
                </div>
                <div class="col-md-12 mt-5">
                    <form method="post" action="login.php">
                        <div class="mb-3">
                            <label class="form-label">No BP</label>
                            <input type="text" name="nobp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="mb-3 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary me-2">Login</button>
                            <a href="register.php" class="btn btn-secondary">Register</a>
                        </div>
                    </form>
                    <?php
                    if (isset($_GET['status'])) {
                        if ($_GET['status'] == 'unregistered') {
                            echo '<div class="alert alert-danger" role="alert">Akun belum terdaftar</div>';
                        } elseif ($_GET['status'] == 'registered') {
                            echo '<div class="alert alert-info" role="alert">Akun sudah terdaftar</div>';
                            echo '<div class="text-center">';
                            echo '<a href="landingpage.php" class="btn btn-primary">Go to Landing Page</a>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
