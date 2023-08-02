<?php
session_start(); // Memulai session

// Simpan nilai 'username' dari sesi ke variabel lokal sebelum menghapus sesi
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Hapus data session, kecuali sesi 'username'
unset($_SESSION['logged_in']);
session_destroy();

// Alihkan ke halaman login setelah logout berhasil
header("Location: login.php");
exit; // Hentikan eksekusi script selanjutnya
?>