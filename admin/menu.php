<?php
    ini_set('display_errors','On');
    error_reporting(E_ALL^E_NOTICE);
    
    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:../login.php');
    }else{
        $user = $_SESSION['email'];
    }
?>
<div id='cssmenu'>
<ul>
   <li><a href='?home'><i class="fa fa-home fa-fw"></i>&nbsp; Home</a></li>
   <li><a href='?user'><i class="fa fa-users fa-fw"></i>&nbsp; Users</a></li>
   <li class='active has-sub'><a href='#'><i class="fa fa-bars fa-fw"></i>&nbsp; Kategori</a>
      <ul>
         <li class='has-sub'>
            <form method="post" action="?postcategories">
               <button type="submit" name="kategori" value="politik" class="btn btn-default btn-block">Politik</button>
            </form>
         </li>
         <li class='has-sub'>
            <form method="post" action="?postcategories">
               <button type="submit" name="kategori" value="pendidikan" class="btn btn-default btn-block">Pendidikan</button>
            </form>
         </li>
         <li class='has-sub'>
            <form method="post" action="?postcategories">
               <button type="submit" name="kategori" value="kesehatan" class="btn btn-default btn-block">Kesehatan</button>
            </form>
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><i class="fa fa-star fa-fw"></i>&nbsp; Articles</a>
      <ul>
         <li><a href='?postall'><span>Semua Artikel</span></a></li>
         <li><a href='?postcreate'><span>Buat Artikel</span></a></li>
         <li><a href='?comment'><span>Komentar</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='mysqli/logout.php'><i class="fa fa-sign-out fa-fw"></i>&nbsp; Logout</a></li>
</ul>
</div>
