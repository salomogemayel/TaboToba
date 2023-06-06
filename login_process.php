<?php
    session_start();
    include_once('config/autoload.php');
    if (isset($_SESSION['is_logged_in'])){
        header("location: index.php");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM user WHERE username=? AND password=?';
    $statement = $conn->prepare($query);
    $statement -> bind_param("ss", $username, $password);
    $statement -> execute();

    $result_set = $statement -> get_result();


    if ($result_set -> num_rows){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['is_logged_in'] = TRUE;
        header('Location: index.php');
    }
    else {
        echo '<script type="text/javascript">'; 
        echo 'alert("Isi username dan password dengan benar !");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
?>