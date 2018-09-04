<?php 
    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:../login.php');
    }else{
        $user = $_SESSION['email'];
    }
 ?>
<!doctype>
<html lang='ind'>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/styles-menu-admin.css">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/font-awesome.min.css">

   <script src="../js/jquery.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/script.js"></script>
   <title>Dashboard Media Blog</title>
   <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
   <div class="col-md-2 colmenu" style="padding:0;">
      <div class="col-md-12" style="padding:10px;"><center><img class="img-circle" src="../img/vespa.jpg" alt="" height="100px" width="100px"></center></div>
      <div class="col-md-12" style="padding:5px;padding-bottom:10px;color:#fff;"><center>Yahya Efendy</center></div>
         <?php include "menu.php"; ?>  
   </div>
   <?php 
         if (isset($_GET['user'])) {
            include "content/user.php";
         }
         elseif (isset($_GET['home'])){
            include "content/home.php";
         }

         // post
         elseif (isset($_GET['postcreate'])) {
            include "content/postcreate.php";
         }elseif (isset($_GET['postall'])) {
            include "content/postall.php";
         }elseif (isset($_GET['postsearch'])) {
            include "content/postsearch.php";
         }elseif (isset($_GET['postal'])) {
            include "content/postall.php";   
         }elseif (isset($_GET['postupdate'])) {
            include "content/postupdate.php";
         }elseif (isset($_GET['postcategories'])) {
            include "content/postcategories.php";
         }elseif (isset($_GET['postupdate'])) {
            include "content/postupdate.php?id=".$row['idartikel'];
         }elseif ((isset($_GET['index.php']))&&($_GET['status']="sukses")) {
            include "content/postall.php?status=sukses";
         }

         // user
         elseif (isset($_GET['updateuser'])) {
            include 'content/updateuser.php';
         }elseif (isset($_GET['usersearch'])) {
            include 'content/usersearch.php';
         }
         elseif (isset($_GET['createuser'])) {
            include 'content/createuser.php';
         }
         elseif (isset($_GET['comment'])) {
            include 'content/comment.php';
         }
         
    ?>
  
</body>
<html>
