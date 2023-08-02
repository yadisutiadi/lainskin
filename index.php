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
$username = $_SESSION['username'];
//$nomor_hp = $_SESSION['nomor_hp'];

// Memeriksa apakah data poin sudah ada dalam sesi
if (!isset($_SESSION['poin'])) {
  // Jika belum ada, ambil data poin dari database dan simpan dalam sesi
  // Lakukan koneksi ke database
  $servername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "lainskincare";

  $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

  // Memeriksa koneksi
  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  // Ambil data poin dari database berdasarkan username user yang sedang login
  $stmt = $conn->prepare("SELECT poin FROM user WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->bind_result($poin);
  $stmt->fetch();

  // Simpan data poin dalam sesi
  $_SESSION['poin'] = $poin;

  // Tutup koneksi database
  $stmt->close();
  $conn->close();
}

// Mengambil data poin dari sesi untuk digunakan pada halaman
$poin = $_SESSION['poin'];
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Home</title>
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

    .rd-navbar-main {
      background: ;
    }

    .rd-navbar-main-outer {
      background: #5F9EA0 !important;
    }

    .color {
      background: #5F9EA0 !important;
    }

    .markis {
      margin-top: 50px !important;
    }

    .markis1 {
      padding-left: 5px;
    }
  </style>
</head>

<body>


  <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
        src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
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
    <!-- Page Header-->
    <a class="banner banner-top" href="#" target="_blank"><img src="images/banner hadiah.png" alt="" /></a>

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
                <!-- login register dan poin-->
                <div class="col-sm-6 col-md-4 text-sm-right text-md-right">
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
                          <?php echo $poin; ?>
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
                </div>

                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php">Home</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="about.php">About</a>
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
    <!-- Swiper-->
    <section class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2"
      data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-direction="vertical">
      <div class="swiper-wrapper text-left">
        <div class="swiper-slide context-dark" data-slide-bg="images/bannermodel2.webp">
          <div class="swiper-slide-caption section-md">
            <div class="container">
              <div class="row">
                <div class="col-md-10">
                  <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Beauty Natural
                    WITH LA'IN SKINCARE</h6>
                  <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100">
                    <span>Kulit yang indah dimulai dari SKINCARE yang</span><span class="font-weight-bold"> Tepat</span>
                  </h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft"
                    data-caption-delay="0">Beli Sekarang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide context-dark" data-slide-bg="images/bannermodel.jpg">
          <div class="swiper-slide-caption section-md">
            <div class="container">
              <div class="row">
                <div class="col-md-10">
                  <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Cintai dirimu
                    percantik kulitmu</h6>
                  <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100">
                    <span>Trust</span><span class="font-weight-bold"> LA'IN SKINCARE</span>
                  </h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft"
                    data-caption-delay="0">Beli Sekarang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide context-dark" data-slide-bg="images/bannermodel1.png">
          <div class="swiper-slide-caption section-md">
            <div class="container">
              <div class="row">
                <div class="col-md-10">
                  <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Cantik bersinar
                    dengan LA'IN SKINCARE</h6>
                  <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100">
                    <span>ALIHKAN PANDANGAN DUNIA HANYA</span><span class="font-weight-bold"> PADAMU</span>
                  </h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft"
                    data-caption-delay="0">Beli Sekarang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Swiper Pagination-->
      <div class="swiper-pagination"></div>
    </section>
    <!-- Section Box Categories-->
    <section class="section section-lg section-top-1 bg-gray-4 markis">
      <div class="container offset-negative-1">
        <div class="box-categories cta-box-wrap">
          <div class="box-categories-content">
            <div class="row justify-content-center">
              <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                <ul class="list-marked-2 box-categories-list">
                  <li><a href="#"><img src="images/FASHWASH.jpg" alt="" width="368" height="420" /></a>
                    <h5 class="box-categories-title">LA'IN Natural Glow Day & Night Cream</h5>
                  </li>
                </ul>
              </div>
              <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                <ul class="list-marked-2 box-categories-list">
                  <li><a href="#"><img src="images/TONER.jpg" alt="" width="368" height="420" /></a>
                    <h5 class="box-categories-title">LA'IN Natural Glow Brightly Ever After Serum</h5>
                  </li>
                </ul>
              </div>
              <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                <ul class="list-marked-2 box-categories-list">
                  <li><a href="#"><img src="images/SERUM.jpg" alt="" width="368" height="420" /></a>
                    <h5 class="box-categories-title">LA'IN Natural Glow Brightening Toner</h5>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- <a class="link-classic wow fadeInUp" href="#">Other<span></span></a> -->
        <!-- Owl Carousel-->
      </div>
    </section>
    <!--	Our Services-->
    <section class="section section-sm">
      <div class="container">
        <h3>Our Services</h3>
        <div class="row row-30">
          <div class="col-sm-6 col-lg-4">
            <article class="box-icon-classic">
              <div
                class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                <div class="unit-left">
                  <div class="box-icon-classic-icon fl-bigmug-line-equalization3"></div>
                </div>
                <div class="unit-body">
                  <h5><i class="fa fa-truck fa-lg"></i><a href="#">Delivery Services</a></h5>
                  <p>Pengiriman Seluruh Indonesia, Cepat - Aman.</p>
                </div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4">
            <article class="box-icon-classic">
              <div
                class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                <div class="unit-left">
                  <div class="box-icon-classic-icon fl-bigmug-line-circular220"></div>
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="#">Wide Variety of Tours</a></h5>
                  <p class="box-icon-classic-text">We offer a wide variety of personally picked tours with destinations
                    all over the globe.</p>
                </div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4">
            <article class="box-icon-classic">
              <div
                class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                <div class="unit-left">
                  <div class="box-icon-classic-icon fl-bigmug-line-favourites5"></div>
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="#">Highly Qualified Service</a></h5>
                  <p class="box-icon-classic-text">Our tour managers are qualified, skilled, and friendly to bring you
                    the best service.</p>
                </div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4">
            <article class="box-icon-classic">
              <div
                class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                <div class="unit-left">
                  <div class="box-icon-classic-icon fl-bigmug-line-headphones32"></div>
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="#">24/7 Support</a></h5>
                  <p class="box-icon-classic-text">You can always get professional support from our staff 24/7 and ask
                    any question you have.</p>
                </div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4">
            <article class="box-icon-classic">
              <div
                class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                <div class="unit-left">
                  <div class="box-icon-classic-icon fl-bigmug-line-hot67"></div>
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="#">Handpicked Hotels</a></h5>
                  <p class="box-icon-classic-text">Our team offers only the best selection of affordable and luxury
                    hotels to our clients.</p>
                </div>
              </div>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4">
            <article class="box-icon-classic">
              <div
                class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                <div class="unit-left">
                  <div class="box-icon-classic-icon fl-bigmug-line-wallet26"></div>
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="#">Best Price Guarantee</a></h5>
                  <p class="box-icon-classic-text">If you find tours that are cheaper than ours, we will compensate the
                    difference.</p>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>
    <!-- Hot tours-->

    <!-- Different People-->
    <section class="section section-sm">
      <div class="container">
        <h3 class="title-block find-car oh"><span class="d-inline-block wow slideInUp">Testimoni LA'IN SKINCARE</span>
        </h3>
        <div class="row row-30 justify-content-center box-ordered">
          <div class="col-sm-6 col-md-5 col-lg-3">
            <!-- Team Modern-->
            <article class="team-modern">
              <div class="team-modern-header"><a class="team-modern-figure" href="#"><img class="img-circles"
                    src="images/user-1-118x118.jpg" alt="" width="118" height="118" /></a>
                <svg x="0px" y="0px" width="270px" height="70px" viewbox="0 0 270 70" enable-background="new 0 0 270 70"
                  xml:space="preserve">
                  <g>
                    <path fill="#161616"
                      d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z"></path>
                  </g>
                </svg>
              </div>
              <div class="team-modern-caption">
                <h6 class="team-modern-name"><a href="#">Diana</a></h6>
                <p class="team-modern-status">Karyawan Swasta</p>
              </div>
            </article>
            <p>cuman coba coba karena banyak promonya, ternyata pemakaian 3 bulan kerasa hasil dan bedanya<br> Thanks
              LA'IN
              SKINCARE</p>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-3">
            <!-- Team Modern-->
            <article class="team-modern">
              <div class="team-modern-header"><a class="team-modern-figure" href="#"><img class="img-circles"
                    src="images/user-2-118x118.jpg" alt="" width="118" height="118" /></a>
                <svg x="0px" y="0px" width="270px" height="70px" viewbox="0 0 270 70" enable-background="new 0 0 270 70"
                  xml:space="preserve">
                  <g>
                    <path fill="#161616"
                      d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z"></path>
                  </g>
                </svg>
              </div>
              <div class="team-modern-caption">
                <h6 class="team-modern-name"><a href="#">Mita</a></h6>
                <p class="team-modern-status">Mahasiswa</p>
              </div>
            </article>
            <p>Sebagai mahasiswa harus tampil glowing dan cerah, sama banyak promo dan hadiahnya hanya di LA'IN SKINCARE
            </p>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-3">
            <!-- Team Modern-->
            <article class="team-modern">
              <div class="team-modern-header"><a class="team-modern-figure" href="#"><img class="img-circles"
                    src="images/user-3-118x118.jpg" alt="" width="118" height="118" /></a>
                <svg x="0px" y="0px" width="270px" height="70px" viewbox="0 0 270 70" enable-background="new 0 0 270 70"
                  xml:space="preserve">
                  <g>
                    <path fill="#161616"
                      d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z"></path>
                  </g>
                </svg>
              </div>
              <div class="team-modern-caption">
                <h6 class="team-modern-name"><a href="#">Vera</a></h6>
                <p class="team-modern-status">Pelajar</p>
              </div>
            </article>
            <p>cari yang pasti cocok dan dikasih harga promo cuman La'in SKINCARE Kayaknya.</p>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-3">
            <!-- Team Modern-->
            <article class="team-modern">
              <div class="team-modern-header"><a class="team-modern-figure" href="#"><img class="img-circles"
                    src="images/user-4-118x118.jpg" alt="" width="118" height="118" /></a>
                <svg x="0px" y="0px" width="270px" height="70px" viewbox="0 0 270 70" enable-background="new 0 0 270 70"
                  xml:space="preserve">
                  <g>
                    <path fill="#161616"
                      d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z"></path>
                  </g>
                </svg>
              </div>
              <div class="team-modern-caption">
                <h6 class="team-modern-name"><a href="#">DIKTA</a></h6>
                <p class="team-modern-status">Karyawan Swasta</p>
              </div>
            </article>
            <p>kirain hanya kemakan promonya, ternyata kemakan juga hasilnya <br> hhe. . .</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Subscribe-->
    <section class="section bg-default text-center offset-top-50">
      <div class="parallax-container" data-parallax-img="images/parallax-1-1920x850.jpg">
        <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-2-21">
          <div class="container">
            <h2 class="heading-2 oh font-weight-normal wow slideInDown"><span
                class="d-block font-weight-semi-bold">Prodak
                Unggulan </span><span class="d-block font-weight-light">Kami</span></h2>
            <p class="text-width-medium text-spacing-75 wow fadeInLeft" data-wow-delay=".1s">Membantu mereka mendapatkan
              kulit glowing dan cerah - promo terbatas</p><a class="button button-secondary button-pipaluk"
              href="#">Lihat
              Detail Barang </a>
          </div>
        </div>
      </div>
    </section>
    <!--	Instagrram wondertour-->
    <section class="section section-sm section-top-0 section-fluid section-relative bg-gray-4">
      <div class="container-fluid">
        <h6 class="gallery-title">Gallery</h6>
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-classic owl-dots-secondary" data-items="1" data-sm-items="2" data-md-items="3"
          data-lg-items="4" data-xl-items="5" data-xxl-items="6" data-stage-padding="15" data-xxl-stage-padding="0"
          data-margin="30" data-autoplay="true" data-nav="true" data-dots="true">
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-1-270x195.jpg" alt="" width="270"
                height="195" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-1-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-1-270x195.jpg" alt="" width="270" height="195" /></a>
            </div>
          </article>
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-2-270x195.jpg" alt="" width="270"
                height="195" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-2-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-2-270x195.jpg" alt="" width="270" height="195" /></a>
            </div>
          </article>
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-3-270x195.jpg" alt="" width="270"
                height="195" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-3-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-3-270x195.jpg" alt="" width="270" height="195" /></a>
            </div>
          </article>
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-4-270x195.jpg" alt="" width="270"
                height="195" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-4-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-4-270x195.jpg" alt="" width="270" height="195" /></a>
            </div>
          </article>
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-5-270x195.jpg" alt="" width="270"
                height="195" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-5-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-5-270x195.jpg" alt="" width="270" height="195" /></a>
            </div>
          </article>
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-6-270x195.jpg" alt="" width="270"
                height="195" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-6-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-6-270x195.jpg" alt="" width="270" height="195" /></a>
            </div>
          </article>
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="images/gallery-image-7-270x195.jpg" alt="" width="270"
                height="195" />
            </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                href="images/gallery-image-7-1200x800-original.jpg" data-lightgallery="item"><img
                  src="images/gallery-image-7-270x195.jpg" alt="" width="270" height="195" /></a>
            </div>
          </article>
        </div>
      </div>
    </section>
    <!-- Page Footer--><a class="banner" href="#" target="_blank"><img src="images/spinwill.jpg" alt="" /></a>
    <footer class="section footer-corporate context-dark color">
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
      <div class="footer-corporate-bottom-panel bg-secondary">
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