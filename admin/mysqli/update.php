<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL^E_NOTICE);

    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:../login.php');
    }else{
        $user = $_SESSION['email'];
    }

   $link = new mysqli('localhost','root','sayait','mediablog');

   if ($link->connect_errno) {
      echo "Connection Failed".$link->connect_errno;
   }

   if (isset($_POST['update'])) {  
   
   $id = $_POST['id'];
   $nama = $_POST['nama'];
   $alamat = $_POST['alamat'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   $sql = "UPDATE user SET nama='$nama', alamat='$alamat', email='$email', password='$password' WHERE iduser='$id'";
   $query = $link->query($sql);

   if ($query) {
      header("location:../index.php?user=update");
   }else{
      header("location:../index.php?user=gagalupdate");
   }
}
?>