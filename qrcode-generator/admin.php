<?php
session_start(); // Memulai session

// Memeriksa apakah data login sudah dikirim dari form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $admin_username = $_POST['admin'];
    $admin_password = $_POST['password'];

    // Verifikasi login dengan database admin
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "lainskincare";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Gunakan prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare("SELECT password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $admin_username);
    $stmt->execute();
    $stmt->store_result();

    // Periksa apakah username ada di tabel admin
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verifikasi password yang diinputkan dengan password yang ada di database
        if (password_verify($admin_password, $hashedPassword)) {
            // Jika login berhasil, simpan data admin ke session
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin_username;

            // Alihkan ke halaman generate.php setelah login berhasil
            header("Location: generate.php");
            exit;
        } else {
            // Jika password salah, tampilkan pesan error
            echo '<div class="error-container"><div class="error-message">Password salah!</div></div>';
        }
    } else {
        // Jika username tidak ditemukan di tabel admin, tampilkan pesan error
        echo '<div class="error-container"><div class="error-message">Username tidak ditemukan!</div></div>';
    }

    // Tutup koneksi database
    $stmt->close();
    $conn->close();
}

?>

<!-- Isi halaman login admin -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan link CSS untuk Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            max-width: 400px;
            margin: auto;
            margin-top: 5%;
        }



        .error-message {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            background-color: rgba(255, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Administrator</h4>
                    </div>
                    <div class="card-body">
                        <form action="admin.php" method="post">
                            <div class="form-group">
                                <label for="admin">Username</label>
                                <input type="tel" class="form-control" id="admin" name="admin"
                                    placeholder="administrator" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="password administrator" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan link JS untuk Bootstrap (JQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>