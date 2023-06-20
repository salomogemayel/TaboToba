<!DOCTYPE html>
<html>
    <head>
        <title>Kelola Instagram</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="assets/img/TaboTobaLogo.png" rel="icon">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <meta charset="utf-8">

        <meta content="width=device-width, initial-scale=1.0" name="viewport">

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

        <style type="text/css">
            /*--------------------------------------------------------------
            # Display Rate Ulasan
            --------------------------------------------------------------*/
            input[type="radio"] {
            display: none;
            }

            input[type="radio"] + label:before {
            content: "★";
            display: inline-block;
            margin-right: 5px;
            font-size: 30px;
            color: rgb(255, 217, 0);
            }

        </style>

    </head>

    <?php
        include_once('config/autoload.php');
        session_start();

        $username = $_SESSION['username'];
                            
        $query = "SELECT role, user_id FROM user WHERE username='$username'";
        $result = $conn -> query($query);
            
        $data = $result-> fetch_assoc();
        $role = $data['role'];
        $id = $data['user_id'];  echo $username ; 

        if($role != 1 and !isset($_SESSION['is_logged_in'])){
            Header("location: index.php");
        }
    ?>

    <body>
        <style type="text/css">                        
        .header {
            background:#fff;
            color: #000000;
            box-shadow:0 2px 5px rgba(0,0,0,0.2);
            padding: 15px 20px;
            width:100%;
            height: 90px;
            position:fixed;
            top:0;
            left:0;
            z-index:9;
        }
        .header .header_in{
            color: #000000;
        }

        #toggle {
            background:transparent;
            border:none;
            width:30px;
            height:30px;
            cursor:pointer; 
            outline:0;
        }

        .sidebar {
            background:#fff;
            width:235px;
            position:fixed;
            top: 50px;
            left:-235px;
            height:100%;
            box-shadow:0 2px 8px rgba(0,0,0,0.2);
            padding: 20px;
            padding-top:50px;
            transition:all 0.3s ease-out;
            z-index: 9;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .sidebar ul li a {
            color: #333;
        }

        .sidebarshow {
            left:0;
        }
        .content {
                margin-top: 50px;
                padding: 20px;
                border-top: 1px solid #ddd;
                border-right: 1px solid #ddd;
                border-bottom: 1px solid #ddd;
            }
        .waktu{
            align-items: end;
        }
        .navbar{
            justify-content:center;
            margin-top: 20px;
        }
        
        

        </style>

        

    </head>
    <body>
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
                <button class="toggle mx-4" id="toggle">
                        <span><a ><i class="fas fa-bars" style="color: #000000;"></i></span>
                </button>
                <a href="index.php" class="logo">
                    <img src="assets/img/TaboTobaLogo.png" alt="" class="img-fluid">
                    <h1 class="logo ms-4"><a href="index.php">Tabo Toba</a></h1>                    
                </a>    
                
                
            </div>     
                   
        </header>
         
        <div class="sidebar" id='sidebar'>
            <nav id="navbar" class="navbar">
                <ul class="nama">
                    <h5 class="ulasan-img"><i class="fas fa-user mx-3" style="color: black;"></i></h5>
                    <h4>
                        <?php  echo $username ; ?>
                    </h4>                          
                </ul>
            </nav>
            <ul class="mt-4">
                <li><a href="admin_dashboard.php"><i class="fas fa-dashboard mx-2"></i>  Dashboard</a></li>
                <li><a href="kelola_produk.php"><i class="fas fa-cookie-bite mx-2"></i> Produk</a></li>
                <li><a href="kelola_ulasan.php"><i class="fas fa-comment mx-2"></i> Ulasan</a></li>
                <li><a href="kode_otorisasi.php"><i class="fas fa-key mx-2"></i> Kode Otorisasi</a></li>
                <li><a href="data_akun.php"><i class="fas fa-users mx-2"></i> Data akun</a></li>
                <li><a href="riwayat_pemesanan.php"><i class="fas fa-shopping-cart mx-2"></i> Riwayat Pemesanan</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-circle-info mx-2"></i> Kelola Informasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="kelola_alamat.php"><i class="fas fa-location-dot mx-2"></i> Alamat</a></li>
                        <li><a href="kelola_nomor_telepon.php"><i class="fas fa-phone mx-2"></i> Nomor Telepon</a></li>
                        <li><a href="kelola_instagram.php"><i class="fa-brands fa-square-instagram fa-xl mx-2"></i> Instagram</a></li>
                        <li><a href="kelola_whatsapp.php"><i class="fa-brands fa-square-whatsapp fa-xl mx-2"></i> WhatsApp</a></li>
                    </ul>
                </li>
                <li><a href="index.php"><i class="fas fa-home mx-2"></i> Beranda Tabo Toba</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt mx-2"></i> Keluar</a></li>
            </ul>
        </div>
        
        <div class="content mb-5">
            <div class="container-lg my-5">
            <div class="container mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Link Instagram</li>
                    </ol>
                </nav>
            </div>
            <div class="container my-2" style="max-width: 600px;">
            <h3 class="mb-4 mt-1">Ubah Link Instagram</h3>
            <?php
                // Retrieve Instagram link from the database
                $query = 'SELECT link FROM instagram';
                $result = $conn->query($query);
                $instagram = $result->fetch_assoc();

                if (isset($_POST['submit'])) {
                    // Get form input value
                    $link = $_POST['link'];

                    // Update the Instagram link in the database
                    $updateQuery = "UPDATE instagram SET link=?";
                    $stmt = $conn->prepare($updateQuery);
                    $stmt->bind_param("s", $link);

                    if ($stmt->execute()) {
                        echo '<div class="alert alert-success mt-3" role="alert">Perubahan berhasil disimpan.</div>';
                        // Update the Instagram variable after successful update
                        $instagram['link'] = $link;
                    } else {
                        echo '<div class="alert alert-danger mt-3" role="alert">Gagal menyimpan perubahan.</div>';
                    }

                    $stmt->close();
                }
                ?>

                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Link Instagram :</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="link" value="<?php echo $instagram['link']; ?>">
                            </div>

                            <input type="submit" class="btn btn-primary my-1" name="submit" value="Simpan perubahan">
                        </form>
                    </div>

            </div>
        </div>
        

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
        </footer>
        <!-- End Footer -->
        <script>
            var btn = document.querySelector('.toggle');
            var btnst = true;
            btn.onclick = function () {
                if (btnst == true) {
                    document.querySelector('.toggle span').classList.add('toggle');
                    document.getElementById('sidebar').classList.add('sidebarshow');
                    btnst = false;
                } else if (btnst == false) {
                    document.querySelector('.toggle span').classList.remove('toggle');
                    document.getElementById('sidebar').classList.remove('sidebarshow');
                    btnst = true;
                }
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>

</html>