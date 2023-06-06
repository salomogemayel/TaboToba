<?php
// delete_product.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the product_id parameter exists
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        // Include the necessary files and establish database connection
        include_once('config/autoload.php');

        // Prepare the delete query
        $query = 'DELETE FROM product WHERE product_id = ?';
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $product_id);

        // Execute the delete query
        if (mysqli_stmt_execute($stmt)) {
            // Product deleted successfully
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header('Location: kelola_produk.php'); // Redirect to the product listing page after deletion
            exit();
        } else {
            // Error occurred while deleting the product
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            die('Error: Unable to delete the product.');
        }
    }
} else {
    // Invalid request method
    die('Invalid request method.');
}
