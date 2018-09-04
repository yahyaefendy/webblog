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

    $target_dir = "upload/";
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $target_file = $target_dir.basename($filename);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (isset($_POST["kirim"])) {

    	$judul = $_POST['judul'];
		$isi = $_POST['isi'];
		$kategori = "";

        foreach (($_POST['kategori']) as $chk1){
            $kategori .=" ".$chk1." ,";
        }

        if (move_uploaded_file($tmpname, $target_file)){
            $image = $filename;
        }else{
            $image = NULL;
        }

        $hasil = (($judul && $isi) && $kategori);

        if (($hasil == NULL) || ($image == NULL)) {
            header("Location:../index.php?postcreate=lengkapi");
        }else{

            $sql = "INSERT INTO artikel (judul, isi, img, kategori) VALUES ('$judul','$isi','$image','$kategori')" ;
            $query = $link->query($sql);

            if ($query) {
                header("Location:../index.php?postcreate=sukses");
            }else{
                header("Location:../index.php?postcreate=sukses");
            }    
        }

		
    }
    	
	$link->close();
?>