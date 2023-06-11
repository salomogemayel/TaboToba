<!DOCTYPE html>
<html>
    <head>
        <title>Edit Produk</title>
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
                <li><a href="index.php"><i class="fas fa-home mx-2"></i> Beranda Tabo Toba</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt mx-2"></i> Keluar</a></li>
            </ul>
        </div>

        <div class="content">

            

    <main id="main">
        
        <div class="container my-2" style="max-width: 900px;">
            <?php
include_once('config/autoload.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "SELECT * FROM product WHERE product_id = $product_id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
        $name = $_POST['product_name'];
        $quantity = $_POST['product_quantity'];
        $price = $_POST['product_price'];
        $description = $_POST['description'];

        $query = "UPDATE product SET name_product='$name', quantity='$quantity', price_produk='$price', description='$description' WHERE product_id=$product_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Pengecekan upload gambar
            if (isset($_FILES['product_images']) && $_FILES['product_images']['error'][0] !== UPLOAD_ERR_NO_FILE) {
                $totalImages = count($_FILES['product_images']['name']);
                $imageUploadErrors = array();

                // Pengulangan upload gambar
                for ($i = 0; $i < $totalImages; $i++) {
                    $imageName = $_FILES['product_images']['name'][$i];
                    $imageTmpName = $_FILES['product_images']['tmp_name'][$i];
                    $imageType = $_FILES['product_images']['type'][$i];

                    // Pengecekan tipe gambar
                    $allowedTypes = array('image/jpeg', 'image/png');
                    if (in_array($imageType, $allowedTypes)) {
                        $imageData = file_get_contents($imageTmpName);
                        $imageData = mysqli_real_escape_string($conn, $imageData);

                        $insertQuery = "INSERT INTO product_image (product_id, image) VALUES ($product_id, '$imageData')";
                        $insertResult = mysqli_query($conn, $insertQuery);

                        if (!$insertResult) {
                            $imageUploadErrors[] = "Error uploading image: $imageName";
                        }
                    } else {
                        $imageUploadErrors[] = "File tidak sesuai: $imageName";
                    }
                }

                if (!empty($imageUploadErrors)) {
                    foreach ($imageUploadErrors as $error) {
                        echo '<div class="alert alert-danger mt-3" role="alert" style="z-index: 1;">' . $error . '</div>';
                    }
                } else {
                    echo '<div class="alert alert-success mt-3" role="alert" style="z-index: 1;">Produk berhasil diperbaharui.</div>';
                }
            } else {
                echo '<div class="alert alert-success mt-3" role="alert" style="z-index: 1;">Produk berhasil diperbaharui.</div>';
            }
        }
    }
}
?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="kelola_produk.php">Kelola Produk</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $product['name_product']; ?></li>
                </ol>
              </nav>
            <div class="row">
                <h1 class="mb-4"><?php echo $product['name_product']; ?></h1>
                <div class="col-lg-6 justify-content-center">
                    <img src="data:image/jpeg;base64, <?php echo base64_encode($product["img"]); ?>" class="img-fluid" width="360">
                </div>
                <div class="col-lg-4">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Produk :</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_name" value="<?php echo $product['name_product']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Harga :</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_price" value="<?php echo $product['price_produk']; ?>">
                        </div>

                        <label for="exampleFormControlInput1" class="form-label">Berat :</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_quantity" value="<?php echo $product['quantity']; ?>">
                            <span class="input-group-text" id="basic-addon1">gram</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk :</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="4"><?php echo $product['description']; ?></textarea>
                        </div>
                        

                            <div class="col-10">
                                <div id="image-inputs">
                                    <div class="form-group my-1">
                                        <label for="image" cclass="form-label mb-2">Gambar 1 :</label>
                                        <input type="file" name="product_images[]" class="form-control-file mt-1 mb-2" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        
                        <button type="button" class="btn btn-primary mt-2 mb-1 w-25 mx-1" id="add-image-input">+</button>
                        <button type="button" class="btn btn-danger mt-2 mb-1 w-25 mx-1" id="delete-image-input" disabled>-</button><br>
                        
                        <input type="submit" class="btn btn-primary my-1" name="submit" value="Simpan perubahan">

                    </form>

                    
                </div>

                <div id="image-inputs">
                    <?php
                    if (isset($_POST['product_images']) && is_array($_POST['product_images'])) {
                        $inputImages = $_POST['product_images'];
                        $totalImages = count($inputImages);
                
                        for ($i = 0; $i < $totalImages; $i++) {
                            $image = $inputImages[$i];
                    ?>
                            <div class="form-group">
                                <label for="image<?php echo $i + 1; ?>">Image <?php echo $i + 1; ?>:</label>
                                <input type="file" name="product_images[]" class="form-control-file" accept="image/*">
                                <img src="<?php echo $image['tmp_name']; ?>" class="uploaded-image" alt="Uploaded Image">
                                <button class="delete-image-btn" data-index="<?php echo $i; ?>">Delete</button>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Gambar Terupload -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Gambar Produk:</label>
                <div class="existing-images">
                    <div class="row">
                    <?php
                    $query = "SELECT * FROM product_image WHERE product_id = $product_id";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $imageId = $row['product_image_id'];
                        $imageData = $row['image'];
                    ?>
                    <div class="col-lg-3 col-md-6 d-flex my-3 align-items-stretch">    
                        <div class="existing-image">
                            <img src="data:image/jpeg;base64, <?php echo base64_encode($imageData); ?>" class="img-fluid existing-image-item my-2" width="150"><br>
                            <button type="button" class="btn btn-danger delete-image " data-image-id="<?php echo $imageId; ?>">Hapus</button>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        </main><!-- End #main -->

        
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
</footer><!-- End Footer -->

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

            var imageCount = 1;

            document.getElementById('add-image-input').addEventListener('click', function () {
                var imageInputsContainer = document.getElementById('image-inputs');

                var newImageInput = document.createElement('div');
                newImageInput.classList.add('form-group', 'my-1');
                newImageInput.innerHTML = '<label for="image" class="form-label mb-2">Gambar ' + (imageCount + 1) + ' :</label>' +
                    '<input type="file" name="product_images[]" class="form-control-file mt-1 mb-2" accept="image/*">';

                imageInputsContainer.appendChild(newImageInput);
                imageCount++;

                // Enable the delete button when there is more than one image input field
                if (imageCount > 1) {
                    document.getElementById('delete-image-input').removeAttribute('disabled');
                }
            });

            document.getElementById('delete-image-input').addEventListener('click', function () {
                var imageInputsContainer = document.getElementById('image-inputs');
                var imageInputs = imageInputsContainer.getElementsByClassName('form-group');
                
                if (imageCount > 1) {
                    imageInputs[imageCount - 1].remove();
                    imageCount--;

                    // Disable the delete button when there is only one image input field
                    if (imageCount === 1) {
                        document.getElementById('delete-image-input').setAttribute('disabled', 'disabled');
                    }
                }
            });

            // Penghapusan gambar
            document.addEventListener("DOMContentLoaded", () => {
                const deleteButtons = document.querySelectorAll(".delete-image");

                deleteButtons.forEach((button) => {
                    button.addEventListener("click", () => {
                        const imageId = button.getAttribute("data-image-id");
                        const confirmation = confirm("Apakah anda yakin untuk menghapus gambar ini ?");

                        if (confirmation) {
                            // Send AJAX request to delete the image
                            const xhr = new XMLHttpRequest();
                            xhr.open("POST", "hapus_gambar_proses.php", true);
                            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    // Remove the image element from the DOM
                                    const imageContainer = button.parentNode;
                                    imageContainer.parentNode.removeChild(imageContainer);
                                } else {
                                    alert("Error deleting image");
                                }
                            };
                            xhr.send(`image_id=${imageId}`);
                        }
                    });
                });
            });

            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </body>

</html>
