<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
</head>
<body>
	
    <div class="container">
        <div class="col-md-12 row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="col-md-12 text-center">
                    <h2>Menu Register</h2>
                </div>
                <div class="col-md-12 mt-5">
                    <form enctype="multipart/form-data" method="post" action="upload.php">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No BP</label>
                            <input type="text" name="nobp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success">Register</button>
							<a href="index.php" class="btn btn-secondary">Login</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
