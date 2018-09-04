<?php
    ini_set('display_errors','On');
    error_reporting(E_ALL^E_NOTICE);

    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:../login.php');
    }else{
        $user = $_SESSION['email'];
    }
    
    require_once ('connect.php');


    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email='$email'";

    $query = $link->query($sql);
    $hasil = $query->fetch_assoc();

    if (($email != NULL) || ($pass != NULL)) {
        
        if ($query->num_rows == 0) {
            header("Location:../../login.php");
        }else{
            if ($pass <> $hasil['password']) {
                header("Location:../../login.php?status=salah");
            }else{
                $_SESSION['email'] = $hasil['email'];
                header("Location:../index.php?home");
            }
        }    

    }else{
        header("Location:../../login.php?status=kosong");
    }


    var_dump($hasil);
    
?>