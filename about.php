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
// Mendapatkan data nama user dari sesi
// Mendapatkan data nama user dari sesi
$username = $_SESSION['username'];
//$nomor_hp = $_SESSION['password'];
// Jika ada fitur logout pada halaman index.php, Anda dapat menyisipkan script logout.php di sini

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>About</title>
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

    .rd-navbar-corporate-list-social .icon.fa.fa-star {
      margin-right: 18px;
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
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="about.php">About</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="shop.php">Shop</a>
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
          <h2 class="breadcrumbs-custom-title">Tentang Kami</h2>
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.html">Home</a></li>
            <li class="active">About</li>
          </ul>
        </div>
        <div class="box-position" style="background-image: url(images/breadcrumbs-bg.jpg);"></div>
      </div>
    </section>
    <!-- Why choose us-->
    <section class="section section-sm section-first bg-default text-md-left">
      <div class="container">
        <div class="row row-50 justify-content-center align-items-xl-center">
          <div class="col-md-10 col-lg-5 col-xl-6"><img src="images/about-1-519x564.jpg" alt="" width="519"
              height="564" />
          </div>
          <div class="col-md-10 col-lg-7 col-xl-6">
            <h1 class="text-spacing-25 font-weight-normal title-opacity-9">Mengapa LA'IN SKINCARE</h1>
            <!-- Bootstrap tabs-->
            <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-4">
              <!-- Nav tabs-->
              <ul class="nav nav-tabs">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-4-1"
                    data-toggle="tab">Penilaian Mereka</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-2"
                    data-toggle="tab">Manfaat</a>
                </li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-3"
                    data-toggle="tab">Terjangkau</a></li>
              </ul>
              <!-- Tab panes-->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="tabs-4-1">
                  <p>Penilaian dan ulasan yang konsumen LA'IN SKINCARE berikan pada marketplace kami : </p>
                  <!-- Linear progress bar-->
                  <article class="progress-linear progress-secondary">
                    <div class="progress-header">
                      <p>Tokopedia</p>
                    </div>
                    <div class="progress-bar-linear-wrap">
                      <div class="progress-bar-linear" data-gradient=""><span class="progress-value">89</span><span
                          class="progress-marker"></span></div>
                    </div>
                  </article>
                  <!-- Linear progress bar-->
                  <article class="progress-linear progress-orange">
                    <div class="progress-header">
                      <p>Shopee</p>
                    </div>
                    <div class="progress-bar-linear-wrap">
                      <div class="progress-bar-linear" data-gradient=""><span class="progress-value">85</span><span
                          class="progress-marker"></span></div>
                    </div>
                  </article>
                  <!-- Linear progress bar-->
                  <article class="progress-linear">
                    <div class="progress-header">
                      <p>Blibli</p>
                    </div>
                    <div class="progress-bar-linear-wrap">
                      <div class="progress-bar-linear" data-gradient=""><span class="progress-value">69</span><span
                          class="progress-marker"></span></div>
                    </div>
                  </article>
                  <article class="progress-linear">
                    <div class="progress-header">
                      <p>Bukalapak</p>
                    </div>
                    <div class="progress-bar-linear-wrap">
                      <div class="progress-bar-linear" data-gradient=""><span class="progress-value">76</span><span
                          class="progress-marker"></span></div>
                    </div>
                  </article>
                  <article class="progress-linear progress-orange">
                    <div class="progress-header">
                      <p>Lazada</p>
                    </div>
                    <div class="progress-bar-linear-wrap">
                      <div class="progress-bar-linear" data-gradient=""><span class="progress-value">71</span><span
                          class="progress-marker"></span></div>
                    </div>
                  </article>
                </div>
                <div class="tab-pane fade" id="tabs-4-2">
                  <div class="row row-40 justify-content-center text-center inset-top-10">
                    <div class="col-sm-4">
                      <!-- Circle Progress Bar-->
                      <div class="progress-bar-circle" data-value="0.87" data-gradient="#01b3a7"
                        data-empty-fill="transparent" data-size="150" data-thickness="12" data-reverse="true">
                        <span></span>
                      </div>
                      <p class="progress-bar-circle-title">Membantu mencerahkan wajah</p>
                    </div>
                    <div class="col-sm-4">
                      <!-- Circle Progress Bar-->
                      <div class="progress-bar-circle" data-value="0.74" data-gradient="#01b3a7"
                        data-empty-fill="transparent" data-size="150" data-thickness="12" data-reverse="true">
                        <span></span>
                      </div>
                      <p class="progress-bar-circle-title">Menghilangkan muka kusam</p>
                    </div>
                    <div class="col-sm-4">
                      <!-- Circle Progress Bar-->
                      <div class="progress-bar-circle" data-value="0.99" data-gradient="#01b3a7"
                        data-empty-fill="transparent" data-size="150" data-thickness="12" data-reverse="true">
                        <span></span>
                      </div>
                      <p class="progress-bar-circle-title">Melembabkan kulit</p>
                    </div>
                  </div>
                  <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk"
                      href="#">Shop</a>
                  </div>
                  <div class="tab-pane fade" id="tabs-4-3">
                    <p>Sleain Harga yang cukup terjangkau LA'IN SKINCARE juga sedang banyak memberikan prodak hadiah
                      seperti : .</p>
                    <div class="text-center text-sm-left offset-top-30 tab-height">
                      <ul class="row-16 list-0 list-custom list-marked list-marked-sm list-marked-secondary">
                        <li>LA'IN Natural Glow Day & Night Cream</li>
                        <li>LA'IN Natural Glow Brightly Ever After Serum</li>
                        <li>LA'IN Natural Glow Brightening Toner</li>
                        <li>LA'IN Natural Glow Face Wash Cleansing</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
    <!-- Latest Projects-->
    <section class="section section-sm section-fluid bg-default">
      <div class="container">
        <h3>Prodak Kami</h3>
      </div>
      <!-- Owl Carousel-->
      <div class="owl-carousel owl-classic owl-timeline" data-items="1" data-md-items="2" data-lg-items="3"
        data-xl-items="4" data-margin="30" data-autoplay="false" data-nav="true" data-dots="true">
        <div class="owl-item">
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-11-420x308.jpg" alt="" width="420"
                height="308" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-11-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-11-420x308.jpg" alt="" width="420" height="308" /></a>
            </div>
          </article>
          <div class="thumbnail-mary-description">
            <h5 class="thumbnail-mary-project"><a href="#">Cleansing</a></h5><span class="thumbnail-mary-decor"></span>
            <h5 class="thumbnail-mary-time">
            </h5>
          </div>
        </div>
        <div class="owl-item">
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-12-420x308.jpg" alt="" width="420"
                height="308" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-12-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-12-420x308.jpg" alt="" width="420" height="308" /></a>
            </div>
          </article>
          <div class="thumbnail-mary-description">
            <h5 class="thumbnail-mary-project"><a href="#">Toner</a></h5><span class="thumbnail-mary-decor"></span>
            <h5 class="thumbnail-mary-time">
            </h5>
          </div>
        </div>
        <div class="owl-item">
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-13-420x308.jpg" alt="" width="420"
                height="308" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-13-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-13-420x308.jpg" alt="" width="420" height="308" /></a>
            </div>
          </article>
          <div class="thumbnail-mary-description">
            <h5 class="thumbnail-mary-project"><a href="#">Serum</a></h5><span class="thumbnail-mary-decor"></span>
            <h5 class="thumbnail-mary-time">
            </h5>
          </div>
        </div>
        <div class="owl-item">
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-14-420x308.jpg" alt="" width="420"
                height="308" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-14-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-14-420x308.jpg" alt="" width="420" height="308" /></a>
            </div>
          </article>
          <div class="thumbnail-mary-description">
            <h5 class="thumbnail-mary-project"><a href="#">Night Cream</a></h5><span
              class="thumbnail-mary-decor"></span>
            <h5 class="thumbnail-mary-time">
            </h5>
          </div>
        </div>
        <div class="owl-item">
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-15-420x308.jpg" alt="" width="420"
                height="308" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-15-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-15-420x308.jpg" alt="" width="420" height="308" /></a>
            </div>
          </article>
          <div class="thumbnail-mary-description">
            <h5 class="thumbnail-mary-project"><a href="#">Serum</a></h5><span class="thumbnail-mary-decor"></span>
            <h5 class="thumbnail-mary-time">
            </h5>
          </div>
        </div>
        <div class="owl-item">
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-16-420x308.jpg" alt="" width="420"
                height="308" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-16-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-16-420x308.jpg" alt="" width="420" height="308" /></a>
            </div>
          </article>
          <div class="thumbnail-mary-description">
            <h5 class="thumbnail-mary-project"><a href="#">Day Cream</a></h5><span class="thumbnail-mary-decor"></span>
            <h5 class="thumbnail-mary-time">
            </h5>
          </div>
        </div>
      </div>
    </section>
    <!-- What people Say-->
    <section class="section section-sm section-last bg-default">
      <div class="container">
        <h3>apa kata mereka </h3>
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true"
          data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
          <!-- Quote Lisa-->
          <article class="quote-lisa">
            <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles"
                  src="images/user-16-100x100.jpg" alt="" width="100" height="100" /></a>
              <div class="quote-lisa-text">
                <p class="q">Pharetra vel turpis nunc eget lorem dolor sed viverra ipsum. Diam phasellus vestibulum
                  lorem sed risus ultricies. Aenean et tortor at risus viverra adipiscing. Aliquet enim tortor at auctor
                  urna. Tortor aliquam nulla facilisi cras fermentum. Malesuada pellentesque elit eget gravida cum
                  sociis natoque.</p>
              </div>
              <h5 class="quote-lisa-cite"><a href="#">Justine</a></h5>
              <p class="quote-lisa-status">Tiktokers</p>
            </div>
          </article>
          <!-- Quote Lisa-->
          <article class="quote-lisa">
            <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles"
                  src="images/user-17-100x100.jpg" alt="" width="100" height="100" /></a>
              <div class="quote-lisa-text">
                <p class="q">Sodales ut etiam sit amet nisl purus. Maecenas accumsan lacus vel facilisis volutpat est.
                  Suscipit adipiscing bibendum est ultricies integer quis auctor. Viverra aliquet eget sit amet tellus
                  cras adipiscing. Posuere ac ut consequat semper viverra nam libero justo laoreet. Iaculis eu non diam
                  phasellus vestibulum lorem sed risus ultricies.</p>
              </div>
              <h5 class="quote-lisa-cite"><a href="#">Rinda</a></h5>
              <p class="quote-lisa-status">Tiktokers</p>
            </div>
          </article>
          <!-- Quote Lisa-->
          <article class="quote-lisa">
            <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles"
                  src="images/user-18-100x100.jpg" alt="" width="100" height="100" /></a>
              <div class="quote-lisa-text">
                <p class="q">Lacus vestibulum sed arcu non odio euismod lacinia. Pellentesque elit ullamcorper dignissim
                  cras. Ultrices eros in cursus turpis massa tincidunt dui. Nunc pulvinar sapien et ligula ullamcorper
                  malesuada proin. Commodo odio aenean sed adipiscing diam. Sed euismod nisi porta lorem mollis aliquam.
                </p>
              </div>
              <h5 class="quote-lisa-cite"><a href="#">Alice</a></h5>
              <p class="quote-lisa-status">Tiktokers</p>
            </div>
          </article>
        </div>
      </div>
    </section>
    <!--Counters-->
    <!-- Counter Classic-->
    <section class="section section-fluid bg-default">
      <div class="parallax-container" data-parallax-img="images/bg-counter-2.jpg">
        <div class="parallax-content section-xl context-dark bg-overlay-26">
          <div class="container">
            <div class="row row-50 justify-content-center border-classic">
              <div class="col-sm-6 col-md-5 col-lg-3">
                <div class="counter-classic">
                  <div class="counter-classic-number"><span class="counter">1000</span><span class="symbol"></span>
                  </div>
                  <h5 class="counter-classic-title">Penjualan Perbulan</h5>
                </div>
              </div>
              <div class="col-sm-6 col-md-5 col-lg-3">
                <div class="counter-classic">
                  <div class="counter-classic-number"><span class="counter">1500</span><span class="symbol"></span>
                  </div>
                  <h5 class="counter-classic-title">Total Pengikut</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
  </script>
</body>

</html>