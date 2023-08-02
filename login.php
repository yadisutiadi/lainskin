<?php
session_start(); // Memulai session

// Memeriksa apakah user sudah login atau belum
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Jika user sudah login, alihkan ke halaman utama
    header("Location: index.php");
    exit; // Hentikan eksekusi script selanjutnya
}

// Proses login jika ada data yang dikirimkan dari form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lakukan proses validasi dan verifikasi login
    $username = $_POST['username']; // Ambil data username dari form input
    $password = $_POST['password']; // Ambil data password dari form input
    // Contoh sederhana, dalam aplikasi nyata, Anda perlu melakukan validasi login dan verifikasi dengan database

    // Verifikasi login dengan database
    // ...
// Verifikasi login dengan database
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "lainskincare";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Gunakan prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare("SELECT id, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userId, $hashedPassword);

    // Periksa apakah username ada di database
    if ($stmt->fetch()) {
        // Verifikasi password yang diinputkan dengan password yang ada di database
        if (password_verify($password, $hashedPassword)) {
            // Jika login berhasil, simpan data user ke session
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $userId; // Simpan ID user dalam sesi

            // Alihkan ke halaman utama setelah login berhasil
            header("Location: index.php");
            exit; // Hentikan eksekusi script selanjutnya
        } else {
            // Jika password salah, tampilkan pesan error
            echo '<div class="error-container"><div class="error-message">Password salah!</div></div>';
        }
    } else {
        // Jika username tidak ditemukan, coba cek apakah admin yang sedang login
        $stmt_admin = $conn->prepare("SELECT id, password FROM admin WHERE username = ?");
        $stmt_admin->bind_param("s", $username);
        $stmt_admin->execute();
        $stmt_admin->bind_result($adminId, $hashedAdminPassword);

        if ($stmt_admin->fetch()) {
            // Verifikasi password yang diinputkan dengan password yang ada di database
            if (password_verify($password, $hashedAdminPassword)) {
                // Jika login berhasil, simpan data admin ke session
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $username;
                $_SESSION['admin_id'] = $adminId; // Simpan ID admin dalam sesi

                // Alihkan ke halaman generate.php setelah login berhasil
                header("Location: generate.php");
                exit; // Hentikan eksekusi script selanjutnya
            } else {
                // Jika password salah, tampilkan pesan error
                echo '<div class="error-container"><div class="error-message">Password salah!</div></div>';
            }
        } else {
            // Jika username tidak ditemukan pada user maupun admin, tampilkan pesan error
            echo '<div class="error-container"><div class="error-message">Username tidak ditemukan!</div></div>';
        }
    }

    // Tutup koneksi database
    $stmt->close();
    $stmt_admin->close();
    $conn->close();
    // ...

}
?>





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
                        <h4 class="text-center">Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukan nama lengkap anda" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukan password anda" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                            <p class="text-center mt-3 mb-0">Belum punya akun? <a href="register.html">Daftar</a></p>
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