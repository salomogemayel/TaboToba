<?php
  include_once('config/autoload.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tabo Toba</title>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Tab Icon -->
  <link href="assets/img/TaboTobaLogo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- CSS Utama -->
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
      
      <nav id="navbar" class="navbar order-last order-lg-0">
        <i class="bi bi-list mobile-nav-toggle mx-4"></i>
        <ul>
          <li><a class="active" href="index.php">Beranda</a></li>
          <li><a href="produk.php">Produk</a></li>
          <li><a href="ulasan.php">Ulasan</a></li>
          <li><a href="tentang_tabotoba.php">Tentang Tabo Toba</a></li>
           
            <?php
              session_start();

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

   <!-- ======= Main Section ======= -->
  <main>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Tabo Toba</h1>
      <h2>Oleh-oleh Khas Toba</h2>
      <a href="produk.php" class="btn-get-started">Lihat Produk</a>
    </div>
  </section>
  <!-- End Hero -->

  
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/makanan.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>UMKM Tabo Toba </h3>
            <p class="fst-italic">
             Selamat Datang Di UMKM Tabo Toba , Jangan Lupa Di Order.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i>Sudah BPOM </li>
              <li><i class="bi bi-check-circle"></i> Merupakan Oleh oleh Atau Makanan Khas Toba/ Suku Batak.</li>
              <li><i class="bi bi-check-circle"></i> Beralamat Di Jl. Pasar Melintang, Tambunan Lumban Pea, Kabupaten Toba.</li>
            </ul>
            <p>
              Memiliki Cita Rasa Khas Yang Autentik 
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
            <button onclick="typeWriter()">Why Choose Tabo Toba?</button>
                <p id="typing"></p>
              <div class="text-center">
                <a href="tentang_tabotoba.php" class="more-btn">Lihat lebih <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Pemesanan Dapat Dilakukan melalui WhatsApp </h4>
                    <p>Pemesanan dapat dilakuakan melalui media sosial dan diusahakan Fast Respon</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Menggunakan Bahan Halal dan higenies</h4>
                    <p>Menggunakan Bahan yang higienis dan dalam pengolahan tidak menggunakan bahan pengawet</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4> Galeri UMKM Di TOBA</h4>
                    <p>Merupakan UMKM Yang sudah mulai banyak dikenal dikalangan Masyarakat Toba dan Kota lainnya.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


  
  <section id="product" class="product">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Produk</h2>
      <p>Tabo Toba</p>
    </div>
    <center>
    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
        <?php
        $query = "SELECT * FROM product";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){ ?>
        <div class="swiper-slide d-flex justify-content-evenly">
          <div class="ulasan-wrap">
            <div class="col-12 d-flex align-items-stretch ">
              <div class="product-item">
                <img src="data:image/jpeg;base64, <?php echo base64_encode($row["img"]); ?>" width="400" class="img-fluid" alt="...">
                <div class="product-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4><?php echo $row["quantity"]; ?> gram</h4>
                    <p class="price">Rp<?php echo $row["price_produk"]; ?></p>
                  </div>
                  <h3>
                    <a href="produk_detail.php?product_id=<?php echo $row["product_id"]; ?>"><?php echo $row["name_product"]; ?></a>
                  </h3>
                  <p><?php echo $row["description"]; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php } ?>
      </div>
    </div>
  </center>
  </div>
</section>

  <!-- ======= Ulasan Section ======= -->
  <section id="ulasan" class="ulasan">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Ulasan</h2>
          <p>Apa Kata Mereka ?</p>
        </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php
    
                $query = "  SELECT r.*, u.username, p.name_product  
                            FROM review r
                            JOIN user u 
                            ON r.user_id = u.user_id
                            JOIN product p
                            ON r.product_id = p.product_id
                            WHERE `show` = 1
                            ORDER BY date DESC";
                
                $result = mysqli_query($conn, $query);
    
                while($row = mysqli_fetch_assoc($result)){?>
    
                <div class="swiper-slide">
                    <div class="ulasan-wrap">
                        <div class="ulasan-item">
                            <h3 class="ulasan-img"><i class="fa-regular fa-user fa-xl" style="color: black;"></i></h3>                        
                            <h3><?php echo $row["username"];?></h3>
                            <h4><?php echo $row["name_product"];?></h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    <?php echo $row["review"];?>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
    
                            <div class="star-rate">
                                <?php
                                    $rating = $row['rate'];
                                    for ($i = 5; $i >= 1; $i--) {
                                        if ($rating >= $i) {
                                            echo '<input class="ulasan" type="radio"' . $i . '" name="rating" value="' . $i . '" id="rating-' . $i . '" checked disabled /><label for="rating-' . $i . '"></label>';
                                        } 
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div><!-- End ulasan item -->
            <?php } ?>
        </div>
      
      </div>
        <div class="swiper-pagination"></div>
      </div>
    
    </section><!-- End ulasan Section -->
    

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>Tabo Toba</h3>
        <p>
          Jl. Ps. Melintang, <br>
          Tambunan Lumban Pea, Aruan<br>
          Kec. Balige, Tobasa, <br>
          Sumatera Utara 20371<br><br>
          <strong>Phone 1:</strong> +62 82277635600<br>
          <strong>Phone 2:</strong> +62 81283857977<br>
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
    function selamatDatang(){
    alert("Hai! Welcome to my website");
}
var i = 0;
            var txt = 'Karena Tabo Toba Merupakan Tempat Yang Pas Untuk Membeli Oleh-oleh Khas Toba Yang Sudah Terjamin Kualitas dan Rasa Nya Dan Tabo toba masih menggunakan tenaga manual dalam pembuatan produk makanannya dan tidak menggunakan bahan pengawet Dan Dijamin Pasti Tidak akan kecewa Jika Mencoba Nya ';
            var speed = 75;
            
            function typeWriter() {
              if (i < txt.length) {
                document.getElementById("typing").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
              }
            }
  </script>

</body>
</html>