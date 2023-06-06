<?php
  include_once('config/autoload.php');

  session_start();
  
  if (!isset($_SESSION['is_logged_in'])){
    echo '<script type="text/javascript">'; 
    echo 'alert("Anda harus login terlebih dahulu sebelum membuat ulasan");'; 
    echo 'window.location.href = "index.php";';
    echo '</script>';
  }
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Buat Ulasan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/TaboTobaLogo.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/jquery.raty.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/jquery.raty.min.js"></script>


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
          <li><a href="tentang_tabotoba.php">Tentang Tabo Toba</a></li>
           
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
        
    <main id="main" data-aos="fade-up">

      <div class="container my-5" style="max-width: 700px;">

        <br>
      
        <h1 class="mt-5">Buat Ulasan</h1>
        <h6>Beri penilaian terhadap produk kami</h6>
        <form class="mt-4" method="post" action="submit_ulasan_proses.php">
            <input type="hidden" name="id" value="<?php echo $data['user_id']; ?>">

            <label for="product">Pilih produk untuk diulas :</label><br>
            <select class="form-select mt-1" aria-label="Default select example" id="product" name="product">
                <option value="">Nama Produk</option>
                <?php

                    $sql = "SELECT * FROM product";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=\"" . $row["product_id"] . "\">" . $row["name_product"] . "</option>";
                    }

                ?>
            </select><br>

            <label for="review">Tulis ulasan anda :</label><br>
            <textarea id="review" name="review" class="form-control mt-1" rows="4"></textarea><br>

            <label for="rating">Penilaian :</label>
            <div id="star-rating"></div>
            <div class="rating">
                <div class="rate">
                    <input type="radio" id="star5" name="rating" value="5"/>
                    <label for="star5"></label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4"></label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3"></label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2"></label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1"></label>
                </div>
            </div>

          <br><br><br><br>
          <input class="form-control" id="submit" type="submit" value="Kirim Ulasan" >
          <style>
            #submit{
              width: 150px;
              background: #B20600;
              color: #fff;
              border-radius: 50px;
              padding: 8px 25px;
              white-space: nowrap;
              transition: 0.3s;
              font-size: 16px;
              display: inline-block;
              border: none;
              min-width: 10px;
              min-height: 35px;
            }

            #submit:hover {
              background: #880c07;
              color: #fff;
            }
          </style>
        </form>
      </div>

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
          function openForm() {
          document.getElementById("myForm").style.display = "block";
          }

          function closeForm() {
          document.getElementById("myForm").style.display = "none";
          }
    </script>

    </body>

    </html>