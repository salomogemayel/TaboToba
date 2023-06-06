<?php
include_once('config/autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image_id'])) {
    $imageId = $_POST['image_id'];

    // Delete the image from the product_image table
    $query = "DELETE FROM product_image WHERE product_image_id = $imageId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        http_response_code(200);
        echo "Image deleted successfully";
    } else {
        http_response_code(500);
        echo "Error deleting image";
    }
} else {
    http_response_code(400);
    echo "Invalid request";
}
?>
