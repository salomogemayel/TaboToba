<?php
session_start();

include_once('config/autoload.php');

$username = $_POST['username'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordconfirm'];
$email = $_POST['email'];
$notelp = $_POST['notelp'];
$alamat = $_POST['alamat'];
$authorizationCode = $_POST['authorization_code'];

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil kode otorisasi dari database
$sql = "SELECT kode FROM authorization WHERE id = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $validAuthorizationCode = $row['kode'];
} else {
    $validAuthorizationCode = "kode_otorisasi_admin"; // Kode otorisasi default jika tidak ada data dalam tabel authorization
}

// Periksa kode otorisasi
if ($authorizationCode !== $validAuthorizationCode) {
    echo '<script type="text/javascript">';
    echo 'alert("Kode otorisasi tidak valid.");';
    echo 'window.location.href = "daftar_admin.php";';
    echo '</script>';
    exit();
}

if (strlen($username) < 8) {
    echo '<script type="text/javascript">';
    echo 'alert("Username harus terdiri dari minimal 8 karakter.");';
    echo 'window.location.href = "daftar_admin.php";';
    echo '</script>';
    exit();
}

$cariUsername = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
if (mysqli_fetch_assoc($cariUsername)) {
    echo '<script type="text/javascript">';
    echo 'alert("Username yang sama sudah terdaftar, coba username yang berbeda.");';
    echo 'window.location.href = "daftar_admin.php";';
    echo '</script>';
    exit();
}

if ($password !== $passwordConfirm) {
    echo '<script type="text/javascript">';
    echo 'alert("Password tidak sesuai.");';
    echo 'window.location.href = "daftar_admin.php";';
    echo '</script>';
    exit();
} elseif (strlen($password) < 8) {
    echo '<script type="text/javascript">';
    echo 'alert("Password harus terdiri dari minimal 8 karakter.");';
    echo 'window.location.href = "daftar_admin.php";';
    echo '</script>';
    exit();
}

$query = "INSERT INTO user (username, password, email, phone_num, role, address) VALUES (?, ?, ?, ?, 1, ?)";
$statement = $conn->prepare($query);
$statement->bind_param('sssis', $username, $password, $email, $notelp, $alamat);
$statement->execute();
$statement->close();

echo '<script type="text/javascript">';
echo 'alert("Akun Anda berhasil terdaftar sebagai admin.");';
echo 'window.location.href = "index.php";';
echo '</script>';
exit();
?>
