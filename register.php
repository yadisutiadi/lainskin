<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lainskincare";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah data nomor hp sudah dikirim dari form
if (isset($_POST['nomor_hp'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Tambahkan ini untuk mengambil nilai password dari form
    $confirm_password = $_POST['confirm_password']; // Tambahkan ini untuk mengambil nilai confirm_password dari form
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $poin = 0;

    // Validasi apakah password dan confirm_password sama
    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan konfirmasi password tidak sama! Silakan coba lagi.');</script>";
    } else {
        // Menyimpan data ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash password sebelum disimpan ke database
        $sql = "INSERT INTO USER (username, password, nomor_hp, alamat_lengkap, poin) VALUES ('$username', '$hashed_password', '$nomor_hp', '$alamat', $poin)";

        if ($conn->query($sql) === TRUE) {
            // Jika proses registrasi berhasil, tampilkan alert
            echo "<script>alert('Registrasi berhasil! Silahkan login dengan nomor hp Anda.');";
            echo "window.location.href = 'login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>