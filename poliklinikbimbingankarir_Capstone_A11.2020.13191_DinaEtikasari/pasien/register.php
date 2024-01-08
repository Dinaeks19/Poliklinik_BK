<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Rest of your code goes here

include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    if ($password === $confirm_password) {
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = $mysqli->query($query);

        if ($result === false) {
            die("Query error: " . $mysqli->error);
        }

        if ($result->num_rows == 0) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $insert_query = "INSERT INTO user (username, password, role) VALUES ('$username', '$hashed_password', '$role')";
            if (mysqli_query($mysqli, $insert_query)) {
                header("Location: Login.php");
                exit;
            } else {
                echo "Pendaftaran gagal.";
            }
        } else {
            echo "Username sudah digunakan.";
        }
    } else {
        echo "Password tidak cocok.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
        <style>
    .card {
        border: none;
    }

    .card-header {
        background-color: black; /* Warna hitam */
        color: white;
        font-weight: bold;
        font-size: 18px;
    }

    .card-body {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group {
        margin-bottom: 10px; /* Sedikit kurangi batas bawah setiap form group */
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007BFF;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .text-danger {
        color: #dc3545;
    }

    a {
        color: #007BFF;
    }

    a:hover {
        text-decoration: none;
    }
</style>


</head>
<body style="background-image: url('images/bgdokter.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <?php include_once("koneksi.php"); ?>
    

    <main role="main" class="container">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center" style="font-weight: bold; font-size: 32px;">Register</div>
                        <div class="card-body">
                            <form method="POST" action="Register.php">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Pilih Peran</label>
                                    <select name="role" class="form-control" required>
                                        <option value="dokter">Dokter</option>
                                        <option value="admin">Admin</option>
                                        <option value="pasien">Pasien</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-3">Sudah Punya Akun? <a href="login.php">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRfJ9f5jz3I4/3r5F5I5j5qofnVf5U1kAl7vC4ks7x" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-nDLU77O4f9vG4JqF01f8Uxl5KveGqZyl5Ci8FQITu97uQOGcnJw92ag0C6w5W/pj" crossorigin="anonymous"></script>
</body>
</html>