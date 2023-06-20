<?php
// Di file search_product.php
include_once('config/autoload.php');

$query = $_POST['keyword']; // Ambil query pencarian dari permintaan AJAX

// Query untuk mencari produk berdasarkan query pencarian
$searchQuery = "SELECT * FROM product WHERE name_product LIKE '%$query%'";
$searchResult = mysqli_query($conn, $searchQuery);

// Tampilkan produk yang sesuai dalam format HTML
while ($row = mysqli_fetch_assoc($searchResult)) {
  echo '
    <div class="col-lg-4 col-md-6 d-flex my-3 align-items-stretch">
      <div class="product-item">
        <img src="data:image/jpeg;base64,'.base64_encode($row["img"]).'" class="img-fluid" alt="...">
        <div class="product-content">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>'.$row["quantity"].' gram</h4>
            <p class="price">Rp'.$row["price_produk"].'</p>
          </div>
          <h3><a href="produk_detail.php?product_id='.$row["product_id"].'">'.$row["name_product"].'</a></h3>
          <p>'.$row["description"].'</p>
        </div>
      </div>
    </div> 
  ';
}
?>
