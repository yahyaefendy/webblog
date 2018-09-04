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

   if ((isset($_POST['cari'])) && ($_POST['keyword'])) {
      $keyword = $_POST['keyword'];

   $sql = "SELECT * FROM user WHERE nama like '%$keyword%' ORDER BY iduser DESC ";
   $result = $link->query($sql);

?>
    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="#">Home</a></li>
         <li class="active">Data User</li>
      </ol>
   </div>

 <div class="col-md-10" style="min-height:600px">
         <div class="col-md-8" style="padding:10px; padding-left:0;padding-right:0;"> 
            <a href="?createuser" class="btn btn-info">Tambah</a>

         </div>
         <div class="col-md-4" style="padding:10px; padding-left:0;padding-right:0;">
            <form class="form-horizontal" role="search" method="post">
                <div class="col-md-8 col-xs-12">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari Akun Disini...">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-default" type="submit" name="submit-cari-akun">Cari Akun</button>
                </div>
            </form>
         </div>

         <?php if ($result) { ?>

            <table class="table table-bordered">
               
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
            }else {
              header("location:?user=kosong");
            }
          
          ?>
   </div>