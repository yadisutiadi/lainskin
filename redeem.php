<?php
session_start();

// Memeriksa apakah sesi user_logged_in sudah diatur dan sesi valid
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // Jika belum login atau sesi tidak valid, alihkan ke halaman login atau halaman lain sesuai kebutuhan
    header("Location: login.php");
    exit; // Hentikan eksekusi script selanjutnya
}

// Cek apakah data dari pemindaian QR code telah dikirimkan melalui metode GET
if (isset($_GET['qr_code_id'])) {
    // Dapatkan ID QR code dari metode GET
    $qr_code_id = $_GET['qr_code_id'];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lainskincare";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Dapatkan informasi QR code dari tabel qr_codes berdasarkan ID QR code
    $sql = "SELECT * FROM qr_codes WHERE id = '$qr_code_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Jika QR code ditemukan, ambil data poin dan status QR code
        $row = $result->fetch_assoc();
        $points = $row['points'];
        $status = $row['status'];

        // Periksa apakah QR code telah dipindai sebelumnya (status = "not_scanned")
        if ($status === "not_scanned") {
            // Dapatkan ID user dari sesi (asumsikan ID user sudah ada dalam sesi setelah user login)
            $user_id = $_SESSION['user_id'];

            // Update nilai poin pada tabel users
            $sql_update_points = "UPDATE users SET points = points + $points WHERE id = '$user_id'";
            if ($conn->query($sql_update_points) === TRUE) {
                // Jika berhasil mengupdate poin pada tabel users, ubah status QR code menjadi "scanned"
                $sql_update_status = "UPDATE qr_codes SET status = 'scanned' WHERE id = '$qr_code_id'";
                if ($conn->query($sql_update_status) === TRUE) {
                    // Redirect ke halaman lain atau tampilkan pesan sukses
                    header("Location: success.php");
                    exit; // Hentikan eksekusi script selanjutnya setelah redirect
                } else {
                    echo "Error updating QR code status: " . $conn->error;
                }
            } else {
                echo "Error updating user points: " . $conn->error;
            }
        } else {
            // QR code sudah dipindai sebelumnya, berikan pesan sesuai kebutuhan (misalnya QR code sudah digunakan)
            echo "QR code sudah dipindai sebelumnya";
        }
    } else {
        // QR code tidak ditemukan, berikan pesan sesuai kebutuhan (misalnya QR code tidak valid)
        echo "QR code tidak valid";
    }

    $conn->close();
}
?>