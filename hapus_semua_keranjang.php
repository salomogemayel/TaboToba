

<!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
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
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/jquery.raty.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/jquery.raty.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </head>

    <body>
        
    <?php
session_start();
include_once('config/autoload.php');

if (isset($_GET['delete_all_items']) && $_GET['delete_all_items'] === 'true') {
    $username = $_SESSION['username'];

    // Get the user ID
    $query = "SELECT user_id FROM user WHERE username='$username'";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
    $user_id = $data['user_id'];

    // Delete all cart items for the user
    $deleteQuery = "DELETE FROM cart WHERE user_id = $user_id";
    if (mysqli_query($conn, $deleteQuery)) {
        ?>
        <script type="text/javascript"> 
            Swal.fire({
                icon: 'success',
                title: '',
                text: 'Semua produk telah dihapus dari keranjang.',
                onClose: function() {
                    window.location.href = "keranjang.php";
                }
            });
        </script>
        <?php
        exit();
    } else {
        // Error occurred while deleting cart items
        echo "Error deleting cart items: " . mysqli_error($conn);
    }
}
?>



    </body>
    </html>