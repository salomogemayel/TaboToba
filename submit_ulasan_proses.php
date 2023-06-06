<?php
	session_start();
    include_once('config/autoload.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review = $_POST["review"];
    $rating = $_POST["rating"];
    $product_id = $_POST["product"];
    $user_id = $_POST["id"];

    if (empty($review) || empty($rating) || empty($product_id) || empty($user_id)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Semua input harus diisi");'; 
        echo 'window.location.href = "form_ulasan.php";';
        echo '</script>';
        exit;
    }

    $query = "INSERT INTO review (`review`, `rate`, `product_id`, `user_id`, `date`) VALUES (?, ?, ?, ?, NOW())";
    $statement = $conn->prepare($query);
    $statement->bind_param('siii', $review, $rating, $product_id, $user_id);
    if (!$statement->execute()) {
        echo "Error: " . $statement->error;
        exit;
    }

    $statement->close();
    $conn->close();
    header("Location:ulasan.php");
    exit;
} 
?>
