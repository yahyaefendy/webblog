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

    if (isset($_POST["kirim"])) {

    	$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$pass = $_POST['password'];

		$sql = "INSERT INTO user (nama, alamat, email, password) VALUES ('$nama','$alamat','$email','$pass')" ;

    	$query = $link->query($sql);
    	if ($query) {
    		header("location:../../login.php?status=sukses");
    	}else{
    		header("location:../../register.php?status=gagal");
    	}
    }
    elseif (isset($_POST["createuser"])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "INSERT INTO user (nama, alamat, email, password) VALUES ('$nama','$alamat','$email','$pass')" ;

        $query = $link->query($sql);
        if ($query) {
            header("Location:../index.php?createuser=sukses");
        }else{
            header("location:../content/createuser.php=gagal");
        }
    }
    	
	$link->close();
?>