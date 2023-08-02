<?php
session_start();

// Hapus sesi admin_logged_in
unset($_SESSION['admin_logged_in']);

// Alihkan pengguna ke halaman admin.php setelah logout
header("Location: admin.php");
exit();
?>