<?php
include_once('config/autoload.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>
  <title>Produk - Tabo Toba</title>
  
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
    
    
    <!-- ======= Navbar ======= -->
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
  

  <main id="main" data-aos="fade-in">

    

      <!-- ======= Product Section ======= -->
      <br>
      
    <section id="product" class="product">
  <div class="container" data-aos="fade-up"  >
      <div class="section-title">
      <div style=" display:flex;">
<div>
<h2 class="mt-4">Produk</h2>
<p>Tabo Toba</p>
</div>
<div style="margin-left: auto;  align-items:center; display: flex; ">
<input class="form-control me-2" type="search"   id="searchInput" placeholder="Cari produk...">
</div>
</div>



      </div>
      <div class="row" data-aos="zoom-in" id="productContainer" >

          <?php
          include_once('config/autoload.php');

          // Pagination configuration
          $resultsPerPage = 6; // Number of products to display per page
          $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number
          $offset = ($currentPage - 1) * $resultsPerPage; // Calculate the offset

          $query = "SELECT COUNT(*) as total FROM product";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $totalProducts = $row['total']; // Total number of products

          $totalPages = ceil($totalProducts / $resultsPerPage); // Calculate the total number of pages

          $query = "SELECT * FROM product LIMIT $offset, $resultsPerPage";
          $result = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($result)) { ?>

          

              <!-- Product Item Section-->
              <div class="col-lg-4 col-md-6 d-flex my-3 align-items-stretch">
                  <div class="product-item">
                      <img src="data:image/jpeg;base64, <?php echo base64_encode($row["img"]); ?>" class="img-fluid" alt="...">
                      <div class="product-content">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                              <h4><?php echo $row["quantity"]; ?> gram</h4>
                              <p class="price">Rp<?php echo number_format($row["price_produk"]); ?></p>
                          </div>
                          <h3>
                              <a href="produk_detail.php?product_id=<?php echo $row["product_id"]; ?>"><?php echo $row["name_product"]; ?></a>
                          </h3>
                          <p><?php echo $row["description"]; ?></p>
                      </div>
                  </div>
              </div> 
              <!-- End Product Item-->

          <?php
          }
          ?>

      </div>

      

      <!-- Pagination -->
      <div class="pagination-container">
  <ul class="pagination">
      <?php
      if ($totalPages > 1) {
          for ($i = 1; $i <= $totalPages; $i++) {
              // Highlight the current page
              $activeClass = ($i == $currentPage) ? 'active' : '';

              // Generate pagination links
              echo '<li class="page-item ' . $activeClass . '"><a class="page-link custom-pagination-link ' . $activeClass . '" href="?page=' . $i . '">' . $i . ' </a></li>';
          }
      }
      ?>
  </ul>
</div>

<style>
  .custom-pagination-link {
      color: #B20600;
  }
  .custom-pagination-link.active {
      background-color: #B20600;
      border-color: #B20600;
      color: #ffffff; /* Text color when hovered */
  }
  .custom-pagination-link:hover{
    background-color: #980C0C;
    color: #ffffff;
    border-color: #B20600;
  }
</style>

      <!-- End Pagination -->

  </div>
</section>
<!-- End Product Section -->

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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
$(document).ready(function() {
$('#searchInput').keyup(function() {
var keyword = $(this).val(); // Mendapatkan kata kunci dari input teks

$.ajax({
  url: 'search_produk.php', // Ganti dengan URL ke file PHP yang akan memproses pencarian
  type: 'POST',
  data: { keyword: keyword },
  dataType: 'html',
  success: function(response) {
    $('#productContainer').html(response); // Menampilkan hasil pencarian pada elemen dengan ID "product"
  }
});
});
});

</script>
  </body>
</html>