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

    $perpage = 5;

    if (isset($_GET['user'])) {
        $page = $_GET['user'];
    }else{
        $page = 1;
    }

    if ($page > 1) {
        $start = ($page * $perpage) - $perpage;
    }else{
        $start = 0;
    }

   $sql = "SELECT * FROM user ORDER BY iduser DESC LIMIT $start, $perpage";
   $result = $link->query($sql);

?>
    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="#">Home</a></li>
         <li class="active">Data User</li>
      </ol>
   </div>

 <div class="col-md-10" style="min-height:600px">
         <div class="col-md-8" style="padding:20px; padding-left:0;padding-right:0;">
            <a href="?createuser" class="btn btn-info">Tambah</a>

         </div>
         <div class="col-md-4" style="padding:10px; padding-left:0;padding-right:0;">
            <form class="form-horizontal" role="search" method="post" action="?usersearch">
                <div class="col-md-8 col-xs-12">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari Akun Disini...">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" type="submit" name="cari">Cari <span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>
         </div>
         <div class="col-md-12">

            <?php if (isset($_GET['user']) && $_GET['user']=="dihapus"): ?>
               <div class="alert alert-success text-center">BERHASIL! User dihapus. :-) </div>        
            <?php endif; ?>


            <?php if (isset($_GET['user']) && $_GET['user']=="gagaldihapus"): ?>
               <div class="alert alert-danger text-center">OOOPPSSS! User gagal dihapus. :-) </div>        
            <?php endif; ?>

            <?php if (isset($_GET['user']) && $_GET['user']=="update"): ?>
               <div class="alert alert-success text-center">BERHASIL! User diupdate. :-) </div>        
            <?php endif; ?>


            <?php if (isset($_GET['user']) && $_GET['user']=="gagalupdate"): ?>
               <div class="alert alert-danger text-center">OOOPPPSS! User gagal diupdate. :-) </div>        
            <?php endif; ?>

            <?php if (isset($_GET['user']) && $_GET['user']=="kosong"): ?>
               <div class="alert alert-danger text-center">OOOPPPSS! User tidak ditemukan. :-) </div>        
            <?php endif; ?>
            

         </div>

         <?php if ($result) { ?>

            <table class="table table-hover">
               
               <tr>
                  <th class="info">Nama</th>
                  <th class="info">Alamat</th>
                  <th class="info">Email</th>
                  <th class="info">Password</th>
                  <th class="info" colspan="2">Action</th>
               </tr>
               <?php while ($row = mysqli_fetch_array($result)) {
               echo "<tr>";
                  echo "<td>".$row['nama'] . "</td>";
                  echo "<td>".$row['alamat'] . "</td>";
                  echo "<td>".$row['email'] . "</td>";
                  echo "<td>".$row['password'] . "</td>";
                  echo "<td><a href='?updateuser&id=".$row['iduser']."'>edit</a></td>";
                  echo "<td><a href='mysqli/deleteuser.php?id=".$row['iduser']."'>delete</a></td>";
               echo "</tr>";

                } ?>

            </table>

            <?php

            } 
                    $data = mysqli_query($link, "SELECT * FROM user");
                    $jmlbaris = mysqli_num_rows($data);

                    $halaman = ceil($jmlbaris/$perpage);

                    ?>
                <!-- pagination -->
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <?php 
                        for ($i=1; $i<=$halaman ; $i++) { 
                          echo "<li class='page-item'><a class='page-link' href='?user=$i'>$i</a></li>";
                        }
                      ?>  
                    </ul>
                  </nav>
                  <!-- akhir pagination -->
            
   </div>