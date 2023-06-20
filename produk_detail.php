<?php
    include_once('config/autoload.php');

    if(isset($_GET['product_id'])) {
      $product_id = $_GET['product_id'];
      $query = "SELECT * FROM product WHERE product_id = $product_id";
      $result = mysqli_query($conn, $query);
      $product = mysqli_fetch_assoc($result);
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $product['name_product']; ?> - Tabo Toba</title>
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

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">


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
          <li><a href="index.php">Beranda</a></li>
          <li><a class="active" href="produk.php">Produk</a></li>
          <li><a href="ulasan.php">Ulasan</a></li>
          <li><a href="tentang_tabotoba.php">Tentang Tabo Toba</a></li>
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

  <main id="main">
  <?php
  $username = $_SESSION['username'];

  $query = "SELECT role, user_id FROM user WHERE username='$username'";
  $result = $conn->query($query);

  $data = $result->fetch_assoc();

  if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $query = "SELECT * FROM product WHERE product_id = $product_id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    if (isset($_POST['tambah_keranjang'])) {
      // Assume $user_id is obtained from the logged-in user
      $user_id = $data['user_id'];
      $quantity = $_POST['quantity'];

      // Insert the product into the cart
      $insertQuery = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
      $insertStmt = $conn->prepare($insertQuery);
      $insertStmt->bind_param("iii", $user_id, $product_id, $quantity);

      if ($insertStmt->execute()) {
        // Redirect the user to the product details page after successful submission
        header("Location: produk_detail.php?product_id=$product_id");
        exit();
      } 

      $insertStmt->close();
    }
  }
  ?>

  <!-- ======= Product Details Section ======= -->
  <section id="course-details" class="course-details mt-5 mb-0">
    <!-- Breadcrumb -->
    <section id="breadcrumb" class="breadcrumb mt-3">
      <div class="container" data-aos="fade-up">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $product['name_product']; ?></li>
        </ol>
      </div>
    </section>
    <!-- End Breadcrumb -->

    <div class="container mt-3 mb-0 justify-content-center text-center" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-6 mb-4">
          <a data-fancybox="carousel" href="data:image/jpeg;base64, <?php echo base64_encode($product['img']); ?>">
            <img src="data:image/jpeg;base64, <?php echo base64_encode($product['img']); ?>" class="img-fluid" width="400" alt="">
          </a>
        </div>
        <div class="col-lg-4">
          <!-- Galeri Section -->
          <center>
          <div class="container mt-1 mb-5 ms-auto" data-aos="fade-up">
            <div id="carouselExampleIndicators" class="carousel slide" style="width: 220px;" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <?php
                $product_id = $_GET['product_id'];
                $query = "SELECT * FROM product_image WHERE product_id = $product_id";
                $result = mysqli_query($conn, $query);
                $num_images = mysqli_num_rows($result);
        
                for ($i = 0; $i < $num_images; $i++) { ?>
                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i; ?>" <?php if ($i === 0) echo 'class="active"'; ?>></li>
                <?php } ?>
              </ol>
        
              <div class="carousel-inner">
                <?php
                $active = true;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                  <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                    <a data-fancybox="carousel" href="data:image/jpeg;base64, <?php echo base64_encode($row['image']); ?>">
                      <img src="data:image/jpeg;base64, <?php echo base64_encode($row['image']); ?>" class="d-block w-100" style="max-width: 250px; object-fit: contain;" alt="...">
                    </a>
                  </div>
                  <?php
                  $active = false;
                } ?>
              </div>
        
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </center>
          <!-- End Galeri Section -->

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Berat</h5>
            <p><?php echo $product['quantity']; ?>gr</p>
          </div>
          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Harga</h5>
            <p>Rp<?php echo number_format($product['price_produk']); ?></p>
          </div>
          <h3><?php echo $product['name_product']; ?></h3>
          <p class="mb-4">
            <?php echo $product['description']; ?>
          </p>

          <form method="POST">
            <div class="row g-3 mt-3">
              <div class="col-sm-4">
                <p>Jumlah :</p>
              </div>
              <div class="col-sm">
                <input type="number" class="form-control" name="quantity" min="1" value="1">
              </div>
            </div>            
            <button type="submit" class="masuk-btn btn-lg pull-right mt-3" name="tambah_keranjang">
              <i class="fa fa-cart-arrow-down me-2"></i> Tambah Ke Keranjang
            </button>
          </form>

        </div>
      </div>
    </div>
  </section>
</main>

    <!-- End Product Details Section -->

<section id="ulasan" class="ulasan"> 
  <div class="container-sm mt-0" data-aos="fade-up">
    <div class="section-title ">
      <h2>Ulasan Produk</h2>
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
                      AND p.product_id = '$product_id'
                      ORDER BY date DESC";
          
          $result = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($result)){?>

          
<div class="swiper-slide">
                <div class="ulasan-wrap">
                    <div class="ulasan-item">
                      <div class="row">
                        <div class="col-md-7">
                        <h3 class="ulasan-img"><i class="fa-regular fa-user fa-xl" style="color: black;"></i></h3>
                        <h3><?php echo $row["username"]; ?></h3>
                        <h4><?php echo $row["name_product"]; ?></h4>
                        <p class="review-text">
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            <?php echo $row["review"]; ?>
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <div class="star-rate">
                            <?php
                            $rating = $row['rate'];
                            for ($i = 5; $i >= 1; $i--) {
                                if ($rating >= $i) {
                                    echo '<input class="ulasan" type="radio" name="rating" value="' . $i . '" id="rating-' . $i . '" checked disabled /><label for="rating-' . $i . '"></label>';
                                } else {
                                    echo '<input class="ulasan" type="radio" name="rating" value="' . $i . '" id="rating-' . $i . '" disabled /><label for="rating-' . $i . '"></label>';
                                }
                            }
                            ?>
                        </div>
                        </div>
                        <div class="col-md-5">
                        <?php
                        if (!empty($row['img'])){
                        $image_path = 'assets\img\gambar ulasan '; // Replace with the actual path to the folder where the images are stored
                        $image_filename = $row['img'];
                        $image_src = $image_path . $image_filename;
                        ?>

                        <img src="<?php echo $image_src; ?>" class="img-fluid" >
                        <?php } ?>
                        </div>
                      </div>                        
                    </div>
                </div>
            </div><!-- End ulasan item -->
      <?php } ?>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
      
  <style>
  .order-btn {
    background-color: #25D366;
    color: #FFFFFF;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
  }

  .order-btn:hover {
    background-color: #128C7E;
    color: #FFFFFF;
  }

  .review-text {
     overflow-wrap: break-word;
  }
  </style>
</body>

</html>
