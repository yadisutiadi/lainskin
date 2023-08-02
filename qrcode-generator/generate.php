<?php
session_start();

// Memeriksa apakah sesi admin_logged_in sudah diatur dan sesi valid
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Jika belum login atau sesi tidak valid, alihkan ke halaman login atau halaman admin.php
    header("Location: admin.php");
    exit; // Hentikan eksekusi script selanjutnya
}

// Cek apakah form telah disubmit dan data points sudah ada
if (isset($_POST['points'])) {
    // Dapatkan ID user dari sesi (asumsikan ID user sudah ada dalam sesi setelah user login)
    $user_id = $_SESSION['user_id']; // Menggunakan kunci "user_id" untuk mengambil ID user dari sesi

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lainskincare";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $points = $_POST['points'];

    // Generate QR code dari data points
    // Simpan QR code dalam variabel $generated_qr_code
    // Ganti bagian ini dengan cara meng-generate QR code sesuai dengan library atau alat yang Anda gunakan

    // Array berisi nilai-nilai barcode yang ingin di-generate secara random
    $min_value = 1; // Nilai minimal barcode
    $max_value = 2000; // Nilai maksimal barcode
    $number_of_codes = 1; // Jumlah barcode yang ingin di-generate
    $codes = array(); // Array untuk menyimpan nilai-nilai barcode

    // Loop untuk meng-generate nilai random dan memasukkannya ke dalam array $codes
    for ($i = 0; $i < $number_of_codes; $i++) {
        $random_code = rand($min_value, $max_value); // Menghasilkan nilai random antara $min_value dan $max_value
        $codes[] = $random_code;
    }

    // Loop untuk meng-generate QR code atau barcode sesuai dengan nilai dalam array $codes
    foreach ($codes as $code) {
        // Memasukkan informasi poin ke dalam QR code dengan karakter pemisah tertentu (misalnya tanda koma)
        $data_qr_code = $code . ',' . $points; // Kode QR code akan berisi kode acak dan jumlah poin dipisahkan oleh tanda koma

        // Simpan QR code dalam variabel $generated_qr_code
        // Ganti bagian ini dengan cara meng-generate QR code sesuai dengan library atau alat yang Anda gunakan

        // Simpan data QR code dan poin ke dalam tabel qr_codes
        $status = "not_scanned"; // QR code awalnya belum di-scan
        $sql = "INSERT INTO qr_codes (code, point, status) VALUES ('$code', '$points', '$status')";
        if ($conn->query($sql) === TRUE) {
            // Jika berhasil disimpan, tampilkan pesan sukses
            echo "<script>alert('QR code berhasil di-generate dan data tersimpan.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Perbarui nilai poin pengguna di tabel user berdasarkan data dari tabel qr_codes
    $sql_update_points = "UPDATE users SET points = points + $points WHERE id = '$user_id'";
    if ($conn->query($sql_update_points) === TRUE) {
        // Jika berhasil memperbarui nilai poin pengguna, tampilkan pesan sukses
        echo "<script>alert('Poin berhasil diperbarui.');</script>";
    } else {
        echo "Error: " . $sql_update_points . "<br>" . $conn->error;
    }

    if ($conn->query($sql) === TRUE) {
        echo "success"; // Kirim respon berhasil ke AJAX
    } else {
        echo "error: " . $conn->error; // Kirim pesan error ke AJAX
    }


    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Generate Poin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

    <style>
        body {
            color: rgb(78, 78, 78);
        }

        .xixi {
            height: 300px;
        }

        .xixi2 {
            margin-top: -150px;
        }

        /* Tambahkan CSS untuk border dan margin QR code */
        #qrcode {
            border: 5px solid #87CEFA;
            /* Warna biru langit */
            padding: 10px;
            border-radius: 10%;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container-fluid xixi bg-primary pt-5 text-center text-white">
        <h2>QR Code Generator</h2>
        <?php
        // Periksa apakah sesi login admin sudah diatur
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true && isset($_SESSION['admin_username'])) {
            // Jika sudah login, tampilkan nama admin yang login
            $admin_username = $_SESSION['admin_username'];
            echo '<span>Hallo, ' . $admin_username . '</span>';
        }
        ?>
        <!-- Tampilkan tombol logout -->
        <br>
        <span><a class="icon fa fa-sign-out text-white" href="logoutadmin.php">Klik Disini Untuk Logout</a></span>
    </div>

    <div class="container xixi2 d-flex justify-content-center">
        <div class="col-lg-4 p-3 bg-white shadow">
            <div class="input-group mb-1">
                <input type="number" class="form-control rounded-0 shadow-none" placeholder="Masukan Jumlah Poin"
                    aria-describedby="btn" id="points" name="points">
                <button class="btn btn-primary rounded-0 shadow-none" id="btnBuat">Buat !
                </button>
            </div>
            <div class="plc text-center mt-4">
                <b>OUTPUT</b><br>
                <span>qr code akan muncul disini !</span>
            </div>
            <div class="d-flex justify-content-center py-3">
                <!-- Ganti id "qrcode" dengan id "qrcodeImg" untuk menampilkan gambar QR code -->
                <div id="qrcodeImg">
                    <img src="" alt="">
                </div>
            </div>
            <div class="d-flex justify-content-center py-3">
                <!-- Ganti id "downloadLink" dengan id "btnSimpan" -->
                <button class="btn btn-primary mx-2" id="btnSimpan">Simpan</button>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center fixed-bottom py-3">Powered by<a href="#">-
            lainskincare.com</a></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    <script src="qrcodejs/jquery.min.js"></script>
    <script src="qrcodejs/qrcode.js"></script>

    <script>
        var qrcode = new QRCode(document.getElementById("qrcodeImg"), {
            text: "",
            width: 128,
            height: 128,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        // Function to generate QR code and set download link
        function generateQRCode() {
            var points = $('#points').val();
            var text = points.toString();
            qrcode.makeCode(text);

            // Mengganti link download dengan gambar QR code yang dihasilkan
            var canvas = document.querySelector("#qrcodeImg canvas");
            var dataURL = canvas.toDataURL("image/png");
            var downloadLink = document.getElementById("btnSimpan");
            downloadLink.href = dataURL;
            downloadLink.download = "qrcode.png"; // Menambahkan atribut download untuk mengatur nama file

            // Mengisi nilai poin ke form tersembunyi yang akan dikirim saat tombol "Simpan" diklik
            var pointsToSave = document.getElementById("pointsToSave");
            pointsToSave.value = points;
        }

        // Attach click event to "Buat!" button
        $('#btnBuat').click(function () {
            generateQRCode();
            return false; // Mencegah form untuk disubmit secara default
        });

        // Attach click event to "Simpan" button
        $('#btnSimpan').click(function () {
            var pointsToSave = $('#points').val(); // Ambil nilai poin dari input
            $.ajax({
                type: "POST",
                url: "generate.php", // Ganti "save_data.php" dengan nama file PHP untuk menyimpan data
                data: {
                    points: pointsToSave // Kirim data poin ke server
                },
                success: function (response) {
                    // Tampilkan alert jika penyimpanan data berhasil
                    alert("Data berhasil tersimpan di database!");
                },
                error: function (xhr, status, error) {
                    // Tampilkan alert jika terjadi kesalahan dalam penyimpanan data
                    alert("Terjadi kesalahan dalam penyimpanan data!");
                }
            });
        });
    </script>
</body>

</html>