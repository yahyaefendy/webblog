<?php
    ini_set('display_errors','On');
    error_reporting(E_ALL^E_NOTICE);

    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:../login.php');
    }else{
        $user = $_SESSION['email'];
    }
// Process delete operation after confirmation
// if(isset($_GET["id"]) && !empty($_GET["id"])){
    // Include config file
    require_once "connect.php";
    
    $target_dir = "upload/";
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $target_file = $target_dir.basename($filename);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


   if (isset($_POST['update'])) {  
   
   $id = $_POST['id'];
   $judul = $_POST['judul'];
   $isi = $_POST['isi'];

    if (move_uploaded_file($tmpname, $target_file)){
        $image = $filename;
    }else{
        $image = NULL;
    }

   $sql = "UPDATE artikel SET judul='$judul', isi='$isi', img='$image' WHERE idartikel='$id'";
   $query = $link->query($sql);

   if ($query) {
      header("location:../index.php?postall=update");
   }else{
      header("location:../index.php?postall=gagalupdate");
   }
}

?>