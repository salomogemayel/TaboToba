<?php
    include_once('config/autoload.php');
    session_start();

    //Ambil ID user
    $username = $_SESSION['username'];
    $query = "SELECT role, user_id FROM user WHERE username='$username'";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
    $user_id = $data['user_id'];

    //Ambil data isi keranjang
    $queryCart = "SELECT c.*, p.name_product, p.price_produk 
                  FROM cart c
                  INNER JOIN product p 
                  ON c.product_id = p.product_id
                  WHERE c.user_id = $user_id";
    $resultCart = mysqli_query($conn, $queryCart);

    //Pesan WA
    $totalPrice = 0;
    $orderDetails = "Halo Tabo Toba !%0ASaya " . $username . ", ingin membeli :%0A%0A";
    while ($row = mysqli_fetch_assoc($resultCart)) {
        $productName = $row['name_product'];
        $productPrice = $row['price_produk'];
        $quantity = $row['quantity'];
        $subtotal = $productPrice * $quantity;
        $totalPrice += $subtotal;

        $orderDetails .= "Produk : " . $productName . "%0A";
        $orderDetails .= "Harga : Rp" . number_format($productPrice) . "%0A";
        $orderDetails .= "Jumlah : " . $quantity . "%0A";
        $orderDetails .= "Subtotal : Rp" . number_format($subtotal) . "%0A%0A";
    }

    $orderDetails .= "Harga Total : Rp" . number_format($totalPrice) . "%0A";
    $orderDetails .= "Nama : " . $username. "%0A";
    $orderDetails .= "Terima Kasih";

    $username = $_SESSION['username'];
    $query = "SELECT nomor FROM nomor_telepon";
    $result = $conn->query($query);
    $nomor_telepon = $result->fetch_assoc();
    $nomor = $nomor_telepon['nomor'];

    $whatsappURL = "https://wa.me/62" . $nomor_telepon['nomor'] . "?&text=" . $orderDetails;

    //Set timezone to UTC+7
    date_default_timezone_set('Asia/Jakarta');
    $orderDate = date('Y-m-d H:i:s');
   
    //Insert ke orders
    $queryOrder = "INSERT INTO orders (order_date, order_total_price, user_id) VALUES ('$orderDate', $totalPrice, $user_id)";
    mysqli_query($conn, $queryOrder);
    $orderId = mysqli_insert_id($conn);

    //Insert ke order_item
    $resultCart = mysqli_query($conn, $queryCart);    
    while ($row = mysqli_fetch_assoc($resultCart)) {
        $productId = $row['product_id'];
        $quantity = $row['quantity'];
        $queryOrderItem = "INSERT INTO order_item (order_id, product_id, quantity) VALUES ($orderId, $productId, $quantity)";
        mysqli_query($conn, $queryOrderItem);
    }

    //Hapus data di cart
    $queryDeleteCart = "DELETE FROM cart WHERE user_id = $user_id";
    mysqli_query($conn, $queryDeleteCart);

    header("Location: " . $whatsappURL);
    exit;
    mysqli_close($conn);
?>
