<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Memeriksa apakah ada data yang dikirimkan melalui form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Membuat koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lainskincare";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mengambil data dari form
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pesan = $_POST['pesan'];

    // Melakukan validasi input dari pengguna
    if (empty($name) || empty($email) || empty($phone) || empty($pesan)) {
        // Jika ada isian yang kosong, tampilkan pesan kesalahan
        echo "Semua isian wajib diisi!";
    } else {
        try {
            $sql = "INSERT INTO pesan (nama, email, phone, pesan) VALUES ('$name', '$email', '$phone', '$pesan')";
            if ($conn->query($sql) === TRUE) {
                // Jika data berhasil disimpan, tampilkan pesan sukses
                echo "Pesan berhasil dikirim!";
            } else {
                // Jika terjadi error saat menyimpan data, tampilkan pesan error
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } catch (Exception $e) {
            // Tangkap pesan error dan tampilkan
            echo "Error: " . $e->getMessage();
        }

    }

    // Tutup koneksi database   
    $conn->close();
}
?>