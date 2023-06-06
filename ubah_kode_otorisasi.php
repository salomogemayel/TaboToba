<?php
session_start();

include_once('config/autoload.php');

$newAuthorizationCode = $_POST['new_authorization_code'];

// Ganti dengan kode otorisasi baru yang akan disimpan dalam database
$validNewAuthorizationCode = "kode_otorisasi_baru";

// Periksa apakah kode otorisasi lama yang dimasukkan oleh admin sesuai dengan yang ada di database
$query = "SELECT kode FROM authorization WHERE id = 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $oldAuthorizationCode = $row['kode'];

    if ($oldAuthorizationCode !== $_POST['old_authorization_code']) {
        echo '<script type="text/javascript">';
        echo 'alert("Kode otorisasi lama tidak valid.");';
        echo 'window.location.href = "kode_otorisasi.php";';
        echo '</script>';
        exit();
    }
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Data kode otorisasi tidak ditemukan.");';
    echo 'window.location.href = "kode_otorisasi.php";';
    echo '</script>';
    exit();
}

// Perbarui kode otorisasi dalam database
$query = "UPDATE authorization SET kode = ? WHERE id = 1";
$statement = $conn->prepare($query);
$statement->bind_param('s', $newAuthorizationCode);
$statement->execute();
$statement->close();

echo '<script type="text/javascript">';
echo 'alert("Kode otorisasi berhasil diubah.");';
echo 'window.location.href = "admin_dashboard.php";';
echo '</script>';
exit();
?>
