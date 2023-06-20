
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Keranjang</title>

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


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

<?php
include_once('config/autoload.php');
session_start();
  
if (!isset($_SESSION['is_logged_in'])){ ?>
  <script type="text/javascript"> 
    Swal.fire({
      icon: 'warning',
      title: 'Login Diperlukan',
      text: 'Anda harus masuk terlebih dahulu untuk melihat keranjang !',
      onClose: function() {
        window.location.href = "index.php";
      }
    });
  </script>
<?php exit(); } ?>

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
          <li><a href="produk.php">Produk</a></li>
          <li><a href="ulasan.php">Ulasan</a></li>
          <li><a href="tentang_tabotoba.php">Tentang Tabo Toba</a></li>

                    <?php

              if (isset($_SESSION['is_logged_in'])) {?>
              <li><a class="active" href="keranjang.php"><i class="fa-solid fa-cart-shopping fa-2xl my-3" style="font-size: 20px;"></i></a></li>

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

   <!-- ======= Main Section ======= -->
   <main class="mt-5">
<?php
    $username = $_SESSION['username'];
                
    $query = "SELECT role, user_id FROM user WHERE username='$username'";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
    $user_id = $data['user_id'];

    // Retrieve cart items for the logged-in user
    $query = "SELECT c.*, p.name_product, p.price_produk 
              FROM cart c
              INNER JOIN product p 
              ON c.product_id = p.product_id
              WHERE c.user_id = $user_id";
    $result = mysqli_query($conn, $query);
?>

<section class="container mt-5">
    <h2 class="mt-5"><i class="fa-solid fa-cart-shopping mx-2"></i> Keranjang Saya</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th>Jumlah</th>
                    <th>Subtotal Harga</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $grandTotal = 0;
                    while ($row = mysqli_fetch_assoc($result)):
                        $subtotal = $row['price_produk'] * $row['quantity'];
                        $grandTotal += $subtotal;
                ?>
                    <tr>
                        <td><?php echo $row['name_product']; ?></td>
                        <td>Rp<?php echo number_format($row['price_produk']); ?></td>
                        <td><?php echo number_format($row['quantity']); ?></td>
                        <td>Rp<?php echo number_format($subtotal); ?></td>
                        <td>
                            <a href="#" onclick="confirmDelete('<?php echo $row['cart_id']; ?>')"><i class="fa-regular fa-circle-xmark fa-xl"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href="#" onclick="confirmDeleteAll()"><i class="fa-regular fa-circle-xmark fa-xl me-1"></i><strong>Hapus Semua</strong></a>
                  </td>
                </tr>
            </tbody>
        </table>

        <h5 class="mt-3">Total Harga: Rp<?php echo number_format($grandTotal); ?></h5>

        <button class="masuk-btn mt-1 ms-auto">
            <a href="checkout.php" style="color: #ffff;">Pesan</a>
        </button>

        <p class="my-2 mx-2">Setelah mengeklik tombol pesan, anda akan diarahkan ke WhatsApp Tabo Toba.</p>
    <?php else: ?>
        <center>
            <h5 class="my-5">Keranjang anda kosong.</h5><br>
        </center>
    <?php endif; ?>
</section>
</main><!-- End #main -->

<script type="text/javascript">
  function confirmDelete(cartId) {
    Swal.fire({
      icon: 'warning',
      title: 'Konfirmasi',
      text: 'Apakah Anda yakin ingin menghapus produk dari keranjang ?',
      showCancelButton: true,
      cancelButtonText: 'Batal',
      confirmButtonText: 'Hapus',
      confirmButtonColor: '#d33'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect to hapus_keranjang.php with the cart_id parameter
        window.location.href = 'hapus_keranjang.php?cart_id=' + cartId;
      }
    });
  }

  function confirmDeleteAll() {
    Swal.fire({
      icon: 'warning',
      title: 'Konfirmasi',
      text: 'Apakah Anda yakin ingin menghapus semua produk dari keranjang ?',
      showCancelButton: true,
      cancelButtonText: 'Batal',
      confirmButtonText: 'Hapus',
      confirmButtonColor: '#d33'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect to hapus_semua_keranjang.php
        window.location.href = 'hapus_semua_keranjang.php?delete_all_items=true';
      }
    });
  }
</script>
<!-- End #main -->



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