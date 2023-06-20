<?php
  include_once('config/autoload.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tentang Tabo Toba</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/TaboTobaLogo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto">
        <img src="assets/img/TaboTobaLogo.png" alt="" class="img-fluid">
        <h1 class="logo me-auto"><a href="index.php">Tabo Toba</a></h1>
      </a>
      
      <!-- ======= Navbar ======= -->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <i class="bi bi-list mobile-nav-toggle mx-4"></i>
        <ul>
          <li><a href="index.php">Beranda</a></li>
          <li><a href="produk.php">Produk</a></li>
          <li><a href="ulasan.php">Ulasan</a></li>
          <li><a class="active" href="tentang_tabotoba.php">Tentang Tabo Toba</a></li>
          <?php
              session_start();

              if (isset($_SESSION['is_logged_in'])) {?>
              <li><a href="keranjang.php"><i class="fa-solid fa-cart-shopping fa-2xl my-3" style="font-size: 20px;"></i></a></li>

              <?php } 
            ?>
           
            <?php

              if (!isset($_SESSION['is_logged_in'])){?>
                <button class="masuk-btn ms-3" id="myBtn">
                  <a style="color: #ffff;">Masuk</a> 
                </button>
                
                <!-- ======= POPUP LOGIN ======= -->
                <div id="myModal" class="modal justify-content-center">
                  <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Masuk</h1>
           
                    <form action="login_process.php" method="POST">  
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input class="form-control" type ="text" maxlength="25" name="username">
                      </div> 

                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" maxlength="25" name="password">
                      </div>

                      <div class="mb-3">
                        <input type="submit" name="login" class="masuk-btn" value="Login" style="margin-left: 0; border-radius: 10px;">
                      </div>
                    </form>

                    <p>
                      Belum memiliki akun ?
                      <a href="daftar.php" style="color: #2450a7;" class="mx-0">Daftar</a>
                      disini.
                    </p>
                  </div>
                </div>
                <!-- ======= POPUP LOGIN END ======= -->

              <?php } else{ ?>
                <button class="masuk-btn ms-4" id="myBtn">
                  <i class="fa-regular fa-user fa-lg mx-auto" style="color: #ffff;"></i>
                </button>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                  <?php
                    $username = $_SESSION['username'];
                
                    $query = "SELECT role, user_id FROM user WHERE username='$username'";
                    $result = $conn -> query($query);

                    $data = $result-> fetch_assoc();
                    $role = $data['role'];
                    $id = $data['user_id'];
                  ?>
                  <!-- Modal content -->
                  <div class="modal-content">
                    <span class="close">&times;</span>   
                      <h3 class="ulasan-img text-center" style="color: black;"><i class="fa-regular fa-user fa-xlg mx-3"></i><?php echo $username ; ?></h3><br><br>
                      
                          <?php                       

                          if($data['role'] == 1){ ?>
                            <div class="row justify-content-center">

                              <div class="col-md-3 mt-1">
                                <button class="masuk-btn ">
                                  <a href="logout.php" role="button" style="color: #ffff;">Logout</a>
                                </button> 
                              </div>

                              <div class="col-md-5 mt-1">
                                <button class="masuk-btn">
                                  <a href="admin_dashboard.php" role="button" style="color: #ffff;">Dashboard</a>
                                </button>
                              </div>

                            </div>                       
                            
                          <?php } else { ?>
                            <div class="row justify-content-center">

                              <div class="col-md-4">
                                <button class="masuk-btn mt-1">
                                  <a href="logout.php" role="button" style="color: #ffff;">Logout</a>
                                </button> 
                              </div>

                            </div> 
                      <?php } ?>
                  </div>    
              </div>   
              <?php } ?>
        </ul>    
        
      </nav><!-- End navbar -->

    </div>
  </header><!-- End Header -->

  
  <main id="main" data-aos="fade-in">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="container">
    <h2>SEJARAH TABO TOBA</h2>
    <p>Sejarah berdirinya Tabo toba dimulai pada masa covid, dimana ketika bu Priska dan Emelia sedang kumpul bersama, mereka mempunyai ide untung membuka bisnis kecil kecilan yang menjual makanan atau produk khas toba,awalnya mereka hanya niat niatan saja dan mereka masih menerima orderan kecil saja, mereka juga bertanya kepada para suami mereka dan suami mereka mendukung nya, awalnya mereka menjual masih 5 kg an saja, dan mereka mempromosikan nya melalui media sosial mereka, ternyata banyak yang suka dan memesannya, dan akhirnya mereka berpikiran untuk membuka usaha UMKM saja, sebenarnya toko utama mereka ada di Bandara silangit , mereka hanya memajang saja di tambunan, dan tujuan mereka membuka di tambunan karena ada saja orang yang mau membeli nya di tempat langsung, selain harga  lebih murah dan juga lebih terjangkau, Tabo toba juga memasarkan produk mereka di toko toko dan tabo toba juga memiliki reseller, Dalam pengolahan nya mereka masih menggunakan jasa sendiri, yang dimana dalam membuat sasagun mereka masih menggunakan alat tradisional dan pembuatan cookies menggunakan oven. dan untuk sambal Pihak tabo toba tidak berani menstok banyak karena demi menjaga kehigienisan dan kesehatan pelanggan. </p>
  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Trainers Section ======= -->
<section id="trainers" class="trainers mb-2">
  <div class="container" data-aos="fade-up">

    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch my-3">
        <div class="member">
          <img src="assets/img/tentang1.jpeg" class="img-fluid equal-height" alt="">
          <div class="member-content">
            <h4>Dr. H. Sandiaga Salahuddin Uno, B.B.A., M.B.A.</h4>
            <span>
                Menteri Pariwisata dan Ekonomi Kreatif Republik Indonesia
            </span>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch my-3">
        <div class="member">
          <img src="assets/img/tentang3.png" class="img-fluid equal-height" alt="">
          <div class="member-content">
            <h4>Radio Del FM</h4>
            <span>Ibu Emalia dengan Radio Del FM
            </span>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch my-3">
        <div class="member">
          <img src="assets/img/tentang2.jpeg" class="img-fluid equal-height" alt="">
          <div class="member-content ">
            <h4>Ibu Devi Simatupang</h4>
            <span>Istri dari Bapak Jenderal TNI Luhut Binsar Pandjaitan, M.P.A.</span>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Trainers Section -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <div class="container mb-5 " data-aos="fade-up">
              <div class="section-title">
                  <h2 class="mt-4">Lokasi Tabo Toba</h2>
                  <p>Kunjungi kami</p>
              </div>
              <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.4608216974625!2d99.11179031045775!3d2.350712157531993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e078ca1163f13%3A0xb701733a1346488!2sTABO%20TOBA!5e0!3m2!1sid!2sid!4v1681437897347!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> <frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-lg-4 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <div class="section-title">
              <h2 class="mt-4"> </h2>
              <p>Reseller Tabo Toba</p>
            </div>
            <p class="fst-italic">
              Toko yang menjual produk-produk Tabo Toba : 
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Tao Tio Cafe, Bandara Internasional Silangit</li>
              <li><i class="bi bi-check-circle"></i> Pizza Etnik Toba, JL. Sisingamangaraja, Balige</li>
              <li><i class="bi bi-check-circle"></i> Bakmi Tabo, Silimbat</li>
              <li><i class="bi bi-check-circle"></i> Joice Salon, Medan</li>
              <li><i class="bi bi-check-circle"></i> Batikta, Tampubolon-Balige</li>
              
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

</main><!-- End #main -->

   <!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>Tabo Toba</h3>
        <?php
          $query = '  SELECT * FROM alamat ';
          $result = $conn -> query($query);
          $address = $result-> fetch_assoc();
          
          $alamat = $address['alamat'];   
          $desa = $address['desa']; 
          $kecamatan = $address['kecamatan']; 
          $kabupaten = $address['kabupaten/kota']; 
          $provinsi = $address['provinsi']; 
          $kode_pos = $address['kode_pos'];                                          
        ?>
        <p>
          <?php echo $address['alamat'] ?>,<br>
          <?php echo $address['desa'] ?>,<br>
          <?php echo $address['kecamatan'] ?>, <?php echo $address['kabupaten/kota'] ?>, <br>
          <?php echo $address['provinsi'] ?>, <?php echo $address['kode_pos'] ?><br><br>          
        </p>
        <?php
          $query = '  SELECT nomor FROM nomor_telepon ';
          $result = $conn -> query($query);
          $no_telp = $result-> fetch_assoc();
          
          $nomor = $no_telp['nomor'];                                            
        ?>
        <p>
          <strong>Phone:</strong> 0<?php echo $no_telp['nomor']?><br>
        </p>
      </div>

      <div class="col-lg-4  col-md-6 footer-links">
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="index.php">Beranda</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="produk.php">Produk</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="Ulasan.php">Ulasan</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="tentang_tabotoba.php">Tentang Tabo Toba</a></li>
        </ul>
      </div>
      <div class="col-lg-2  col-md-6 footer-newsletter ms-auto mb-auto">
        <img height="130px" src="assets/img/TaboTobaLogo.png">
      </div>
    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>Tabo Toba</span></strong>. All Rights Reserved
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="https://www.instagram.com/tabo.toba/" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="https://api.whatsapp.com/send/?phone=6281283857977&text&type=phone_number&app_absent=0" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
  </div>
</div>
</footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
          function openForm() {
          document.getElementById("myForm").style.display = "block";
          }

          function closeForm() {
          document.getElementById("myForm").style.display = "none";
          }
      </script>

    </body>

</html>