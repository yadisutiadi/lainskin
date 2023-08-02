<?php
session_start(); // Memulai session

// Memeriksa apakah user sudah login atau belum
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Jika user belum login, alihkan ke halaman login
  header("Location: login.php");
  exit; // Hentikan eksekusi script selanjutnya
}

// Jika user sudah login, tampilkan halaman dashboard
// Anda dapat menambahkan konten halaman dashboard di sini
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>shop</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport"
    content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="images/LOGO LAIN.jpg" type="image/LOGO LAIN">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/templatemo.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="css/spinwill.css">

  <!-- Load fonts style after rendering the layout styles -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <style>
    .ie-panel {
      display: none;
      background: #212121;
      padding: 10px 0;
      box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
      clear: both;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
      display: block;
    }

    .card {
      padding: 20px;
      margin-top: 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .product-image {
      width: 100%;
      max-height: 100%;
      object-fit: cover;
    }

    .product-name {
      font-size: 18px;
      font-weight: bold;
    }

    .product-price {
      color: red;
      text-decoration: line-through;
    }

    .buy-button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 8px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 5px;
    }

    .buy-button:hover {
      transform: scale(1.1);
    }
  </style>
</head>

<body>
  <div class="ie-panel"><a href="#"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
        alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
  </div>
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>
  <div class="page">
    <!-- Page Header--><a class="banner banner-top" href="#" target="_blank"><img src="images/banner hadiah.png"
        alt="" /></a>
    <header class="section page-header">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
          data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
          data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
          data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
          data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
          data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
            <span></span>
          </div>
          <div class="rd-navbar-aside-outer">
            <div class="rd-navbar-aside">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand">
                  <!--Brand--><a class="brand" href="index.html"><img src="images/LOGOLAIN.png" alt="" width="225"
                      height="18" /></a>
                </div>
              </div>
              <!-- Buatlah tombol Scan QR Code dengan logo QR Code -->
              <div class="rd-navbar-aside-right rd-navbar-collapse">
                <ul class="rd-navbar-corporate-contacts">
                  <li>
                    <div class="unit unit-spacing-xs">
                    </div>
                  </li>
                </ul>
                <!-- Ganti tombol Customer Service menjadi tombol untuk mengakses scan QR code melalui modal -->
                <button class="button button-md button-default-outline-2" data-toggle="modal" data-target="#qrCodeModal"
                  style="margin-right:-10px;">
                  <span class="icon fa fa-qrcode"></span> Scan QR
                </button>
                <button class="button button-md button-default-outline-2" data-toggle="modal" data-target="#spinwheel"
                  style="margin-right:1px;">
                  <span class="fa fa-gift"></span> Ambil Hadiah
                </button>
              </div>
              <!-- Modal untuk scan QR code -->
              <div class=" modal fade" id="qrCodeModal" tabindex="-1" role="dialog" aria-labelledby="qrCodeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="qrCodeModalLabel">Pilih Cara Klaim Poin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex justify-content-around">
                        <form action="">
                          <!-- Tombol untuk mengakses kamera dan melakukan scan QR code -->
                          <label for="cam">Scan QR Code Poin :</label>
                          <button class="btn btn-primary" id="cam" onclick="scanQRCode()">Cam</button>
                          <!-- Kolom untuk memasukkan kode QR code secara manual -->
                          <label for="manual">Masukkan manual code :</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="manual" placeholder="Masukkan kode QR code">
                            <div class="input-group-append">
                              <button class="btn btn-primary" type="button" onclick="submitManualCode()">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal untuk spinwheel -->
              <div class="modal fade" id="spinwheel" tabindex="-1" role="dialog" aria-labelledby="qrCodeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="qrCodeModalLabel">Pilih Cara Klaim Poin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex justify-content-around">
                        <form action="">
                          <!-- Tombol untuk mengakses kamera dan melakukan scan QR code -->
                          <label for="cam">Scan QR Code Poin :</label>
                          <button class="btn btn-primary" id="cam" onclick="scanQRCode()">Cam</button>
                          <!-- Kolom untuk memasukkan kode QR code secara manual -->
                          <label for="manual">Masukkan manual code :</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="manual" placeholder="Masukkan kode QR code">
                            <div class="input-group-append">
                              <button class="btn btn-primary" type="button" onclick="submitManualCode()">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="rd-navbar-main-outer">
            <div class="rd-navbar-main">
              <div class="rd-navbar-nav-wrap">
                <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                  <!-- Info User Login -->
                  <li>
                    <?php
                    // Periksa apakah sesi login sudah diatur
                    if (isset($_SESSION['username'])) {
                      // Jika sudah login, tampilkan nama user yang login
                      $username = $_SESSION['username'];
                      echo '<span>Hallo, ' . $username . '</span>';
                    }
                    ?>
                  </li>
                  <!-- Icon for Poin -->
                  <!-- Icon for Poin -->
                  <li>
                    <a class="icon fa fa-star position-relative" href="#">
                      <span
                        class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                        <?php
                        // Periksa apakah sesi login sudah diatur dan ada data poin pada sesi
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['poin'])) {
                          $poin = $_SESSION['poin'];
                          echo $poin;
                        } else {
                          echo '0'; // Jika tidak ada data poin, tampilkan nilai 0
                        }
                        ?>
                      </span>
                    </a>
                  </li>
                  <li>
                    <?php
                    // Tampilkan tombol logout
                    echo '<a href="logout.php">Logout</a> ';
                    echo '<a class="icon fa fa-sign-out" href="logout.php"></a>';
                    ?>
                  </li>
                </ul>
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Home</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="about.php">About</a>
                  </li>
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="shop.php">Shop</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="contact.php">Contact Us</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- Breadcrumbs -->
    <section class="breadcrumbs-custom-inset">
      <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
          <h2 class="breadcrumbs-custom-title">Shop</h2>
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.html">Home</a></li>
            <li class="active">Shop</li>
          </ul>
        </div>
        <div class="box-position" style="background-image: url(images/breadcrumbs-bg.jpg);"></div>
      </div>
    </section>

    <!-- prodak-->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
          <div class="card text-center">
            <img src="images/banner-01.jpeg" alt="" class="product-image">
            <div class="card-body">
              <h3 class="card-title product-name">LA'IN Natural Glow Day & Night Cream</h3>
              <p class="card-text product-size">~ 30ml</p>
              <div class="product-rating">
                <ul class="list-unstyled d-flex justify-content-center mb-1">
                  <li>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                  </li>
                </ul>
              </div>
              <h6 class="product-price">Rp.300.000</h6>
              <h4 class="price-asli">Rp.280.000</h4>
              <button class="buy-button animated-button">Beli
                Sekarang <a href="detail.html"></a></button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="card text-center">
            <img src="images/banner-01.jpeg" alt="" class="product-image">
            <div class="card-body">
              <h3 class="card-title product-name">LA'IN Natural Glow Day & Night Cream</h3>
              <p class="card-text product-size">~ 30ml</p>
              <div class="product-rating">
                <ul class="list-unstyled d-flex justify-content-center mb-1">
                  <li>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                  </li>
                </ul>
              </div>
              <h6 class="product-price">Rp.300.000</h6>
              <h4 class="price-asli">Rp.280.000</h4>
              <button class="buy-button animated-button">Beli Sekarang </button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="card text-center">
            <img src="images/banner-01.jpeg" alt="" class="product-image">
            <div class="card-body">
              <h3 class="card-title product-name">LA'IN Natural Glow Day & Night Cream</h3>
              <p class="card-text product-size">~ 30ml</p>
              <div class="product-rating">
                <ul class="list-unstyled d-flex justify-content-center mb-1">
                  <li>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                  </li>
                </ul>
              </div>
              <h6 class="product-price">Rp.300.000</h6>
              <h4 class="price-asli">Rp.280.000</h4>
              <button class="buy-button animated-button">Beli Sekarang </button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="card text-center">
            <img src="images/banner-01.jpeg" alt="" class="product-image">
            <div class="card-body">
              <h3 class="card-title product-name">LA'IN Natural Glow Day & Night Cream</h3>
              <p class="card-text product-size">~ 30ml</p>
              <div class="product-rating">
                <ul class="list-unstyled d-flex justify-content-center mb-1">
                  <li>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                  </li>
                </ul>
              </div>
              <h6 class="product-price">Rp.300.000</h6>
              <h4 class="price-asli">Rp.280.000</h4>
              <button class="buy-button animated-button">Beli Sekarang </button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="card text-center">
            <img src="images/banner-01.jpeg" alt="" class="product-image">
            <div class="card-body">
              <h3 class="card-title product-name">LA'IN Natural Glow Day & Night Cream</h3>
              <p class="card-text product-size">~ 30ml</p>
              <div class="product-rating">
                <ul class="list-unstyled d-flex justify-content-center mb-1">
                  <li>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                  </li>
                </ul>
              </div>
              <h6 class="product-price">Rp.300.000</h6>
              <h4 class="price-asli">Rp.280.000</h4>
              <button class="buy-button animated-button">Beli Sekarang </button>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="card text-center">
            <img src="images/banner-01.jpeg" alt="" class="product-image">
            <div class="card-body">
              <h3 class="card-title product-name">LA'IN Natural Glow Day & Night Cream</h3>
              <p class="card-text product-size">~ 30ml</p>
              <div class="product-rating">
                <ul class="list-unstyled d-flex justify-content-center mb-1">
                  <li>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                  </li>
                </ul>
              </div>
              <h6 class="product-price">Rp.300.000</h6>
              <h4 class="price-asli">Rp.280.000</h4>
              <button class="buy-button animated-button" onclick="redirectToDetailPage()">Beli Sekarang</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page Footer--><a class="banner" href="#" target="_blank"><img src="images/spinwill.jpg" alt="" /></a>
    <footer class="section footer-corporate context-dark">
      <div class="footer-corporate-inset">
        <div class="container">
          <div class="row row-40 justify-content-lg-between">
            <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
              <div class="oh-desktop">
                <div class="wow slideInRight" data-wow-delay="0s">
                  <h6 class="text-spacing-100 text-uppercase">Contact us</h6>
                  <ul class="footer-contacts d-inline-block d-sm-block">
                    <li>
                      <div class="unit">
                        <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                        <div class="unit-body"><a class="link-phone" href="tel:#">021-3970-2295</a></div>
                      </div>
                    </li>
                    <li>
                      <div class="unit">
                        <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                        <div class="unit-body"><a class="link-aemail" href="mailto:#">Lainskincare2023@gmail.com</a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="unit">
                        <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                        <div class="unit-body"><a class="link-location" href="#">Jakarta Pusat</a></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-3 col-xl-4">
              <div class="oh-desktop">
                <div class="wow slideInDown" data-wow-delay="0s">
                  <h6 class="text-spacing-100 text-uppercase">Popular Product</h6>
                  <!-- Post Minimal 2-->
                  <article class="post post-minimal-2">
                    <p class="post-minimal-2-title"><a href="#">LA'IN Natural Glow Day & Night Cream</a></p>
                  </article>
                  <!-- Post Minimal 2-->
                  <article class="post post-minimal-2">
                    <p class="post-minimal-2-title"><a href="#">LA'IN Natural Glow Brightly Ever After Serum</a>
                    </p>
                  </article>
                  <article class="post post-minimal-2">
                    <p class="post-minimal-2-title"><a href="#">LA'IN Natural Glow Brightening Toner</a>
                    </p>
                  </article>
                  <article class="post post-minimal-2">
                    <p class="post-minimal-2-title"><a href="#">LA'IN Natural Glow Face Wash Cleansing</a>
                    </p>
                  </article>
                </div>
              </div>
            </div>
            <div class="col-sm-11 col-md-7 col-lg-5 col-xl-4">
              <div class="oh-desktop">
                <div class="wow slideInLeft" data-wow-delay="0s">
                  <h6 class="text-spacing-100 text-uppercase">More Information</h6>
                  <ul class="row-6 list-0 list-marked list-marked-md list-marked-secondary list-custom-2">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                  <div class="group-md group-middle justify-content-sm-start"><a
                      class="button button-lg button-primary button-ujarak" href="#">Customer Service</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-corporate-bottom-panel">
        <div class="container">
          <div class="row justfy-content-xl-space-berween row-10 align-items-md-center2">
            <div class="col-sm-6 col-md-4 text-sm-right text-md-center">
              <div>
                <ul class="list-inline list-inline-sm footer-social-list-2">
                  <li><a class="icon fa fa-facebook" href="#"></a></li>
                  <li><a class="icon fa fa-twitter" href="#"></a></li>
                  <li><a class="icon fa fa-google-plus" href="#"></a></li>
                  <li><a class="icon fa fa-instagram" href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 order-sm-first">
              <!-- Rights-->
              <p class="rights"><span>&copy;&nbsp;</span><span
                  class="copyright-year"></span><span>&nbsp;</span><span>LA'IN SKINCARE</span>. All Rights Reserved.
            </div>
            <div class="col-sm-6 col-md-4 text-md-right">
              <p class="rights"><a href="#">Privacy Policy</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- Global Mailform Output-->
  <div class="snackbars" id="form-output-global"></div>
  <!-- Javascript-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="qrcode-generator/qrcodejs/jquery.min.js"></script>
  <script src="qrcode-generator/qrcodejs/qrcode.js"></script>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <!-- Tambahkan link JS untuk Bootstrap (JQuery dan Popper.js) -->


  <!-- Jangan lupa letakkan kode JavaScript di bawah elemen HTML -->
  <script>
    function scanQRCode() {
      // Isi dengan kode untuk mengakses kamera dan melakukan scan QR code
      // Misalnya, Anda bisa menggunakan library jsQR atau QuaggaJS untuk melakukan scan QR code
      // Setelah mendapatkan hasil scan, Anda dapat melakukan sesuatu dengan data QR code tersebut
      alert('Scan QR Code berhasil!');
    }

    function openCamera() {
      // Isi dengan kode untuk mengakses kamera melalui modal
      // Anda dapat menggunakan API getUserMedia atau library lain untuk mengakses kamera
      // Setelah kamera diakses, Anda dapat menampilkan tampilan kamera ke dalam modal
      // Pengguna dapat menggunakan tampilan kamera ini untuk melakukan scan QR code secara langsung
      // atau memasukkan kode QR code secara manual
      alert('Kamera telah diakses. Silakan lakukan scan QR Code atau masukkan kode secara manual.');
    }
    function redirectToDetailPage() {
      // Ganti "detail.php" dengan URL atau path menuju halaman detail.php yang sesuai dengan struktur proyek Anda
      window.location.href = "detail.php";
    }
  </script>
</body>

</html>