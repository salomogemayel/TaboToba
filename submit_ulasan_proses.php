<?php
session_start();
include_once('config/autoload.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review = $_POST["review"];
    $rating = $_POST["rating"];
    $product_id = $_POST["product"];
    $user_id = $_POST["id"];

    // Check if the required fields are empty
    if (empty($review) || empty($rating) || empty($product_id) || empty($user_id)) {
        echo '<script type="text/javascript">';
        echo 'alert("Semua input harus diisi");';
        echo 'window.location.href = "form_ulasan.php";';
        echo '</script>';
        exit;
    }

    // Check if an image was uploaded
    if ($_FILES['image']['name'] != '') {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_path = "assets\img\gambar ulasan "; // Replace with the actual path to save the images
        $image_destination = $image_path . $image;

        // Check if the uploaded file is an image
        $allowed_types = array('image/jpeg', 'image/jpg', 'image/png');
        if (in_array($image_type, $allowed_types)) {
            // Move the uploaded image to the destination folder
            if (move_uploaded_file($image_tmp, $image_destination)) {
                // Image successfully saved in the folder
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Gagal menyimpan gambar");';
                echo 'window.location.href = "form_ulasan.php";';
                echo '</script>';
                exit;
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Tipe file yang diunggah tidak valid");';
            echo 'window.location.href = "form_ulasan.php";';
            echo '</script>';
            exit;
        }
    } else {
        $image = ""; // If no image was uploaded, set it to empty
    }

    // Insert the review into the database
    $query = "INSERT INTO review (`review`, `rate`, `product_id`, `user_id`, `img`, `date`) VALUES (?, ?, ?, ?, ?, NOW())";
    $statement = $conn->prepare($query);
    $statement->bind_param('siiis', $review, $rating, $product_id, $user_id, $image);
    if (!$statement->execute()) {
        echo "Error: " . $statement->error;
        exit;
    }

    $statement->close();
    $conn->close();
    header("Location: ulasan.php");
    exit;
}
?>
