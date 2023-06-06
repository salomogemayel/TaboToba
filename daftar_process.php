<?php
    session_start();

    include_once('config/autoload.php');

    $username = $_POST['username']; 
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];

    if (strlen($username) < 8) { // Pengecekan karakter minimum username
        echo '<script type="text/javascript">'; 
        echo 'alert("Username harus terdiri dari minimal 8 karakter.");'; 
        echo 'window.location.href = "daftar.php";';
        echo '</script>';
    } else {
        $cariUsername = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
        if (mysqli_fetch_assoc($cariUsername)) { // Pengecekan duplikat username
            echo '<script type="text/javascript">'; 
            echo 'alert("Username yang sama sudah terdaftar, coba username yang berbeda.");'; 
            echo 'window.location.href = "daftar.php";';
            echo '</script>';  
        } else {
            if ($password !== $passwordconfirm) { // Pengecekan konfirmasi password
                echo '<script type="text/javascript">'; 
                echo 'alert("Password tidak sesuai");'; 
                echo 'window.location.href = "daftar.php";';
                echo '</script>';
            } elseif (strlen($password) < 8) { // Pengecekan karakter minimum password
                echo '<script type="text/javascript">'; 
                echo 'alert("Password harus terdiri dari minimal 8 karakter.");'; 
                echo 'window.location.href = "daftar.php";';
                echo '</script>';
            } else {
                $query = "INSERT INTO user (username, password, email, phone_num, address) VALUES (?, ?, ?, ?, ?)";
                $statement = $conn->prepare($query);
                $statement->bind_param('sssis', $username, $password, $email, $notelp, $alamat);
                $statement->execute();
                $statement->close();

                echo '<script type="text/javascript">'; 
                echo 'alert("Akun anda berhasil terdaftar.");'; 
                echo 'window.location.href = "index.php";';
                echo '</script>';
                
                // header('Location: index.php'); 
            }
        }
    }
?>
