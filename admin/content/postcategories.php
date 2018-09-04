<?php
    ini_set('display_errors','On');
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
   
    if ($_POST['kategori']=="politik") {
      $sql = "SELECT * FROM artikel WHERE kategori like '%politik%' ORDER BY idartikel DESC";
    }
    elseif ($_POST['kategori']=="pendidikan") {
      $sql = "SELECT * FROM artikel WHERE kategori like '%pendidikan%' ORDER BY idartikel DESC";
    }
    elseif ($_POST['kategori']=="kesehatan") {
      $sql = "SELECT * FROM artikel WHERE kategori like '%kesehatan%'ORDER BY idartikel DESC";
    }

   $query = $link->query($sql);

?>
    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li class="active">Articles</li>
      </ol>
      </div>
       <div class="col-md-10" style="min-height:600px">
        <div class="col-md-12" style="padding:20px; padding-left:20;padding-right:0;">
          <h3>Kategori artikel anda.</h3>
          <hr>
          <?php if (isset($_GET['postall']) && $_GET['postall']=="sukses"): ?>
            <div class="alert alert-success text-center">BERHASIL! Artikel dihapus. :-) </div>        
          <?php endif; ?>

         <?php if ($query) { ?>

            <table class="table table-hover">
               
               <tr>
                  <th class="info">Judul</th>
                  <th class="info">Isi</th>
                  <th class="info">Image</th>
                  <th class="info">Kategori</th>
                  <th class="info" colspan="2">Action</th>
               </tr>
               <?php while ($row = mysqli_fetch_array($query)) {
               echo "<tr>";
                  echo "<td>".$row['judul'] . "</td>";
                  echo "<td>".$row['isi'] . "</td>";
                  echo "<td><img class='img-circle' src='mysqli/upload/".$row['img'] . "' height='100px' width='100px'></td>";
                  echo "<td>".$row['kategori'] . "</td>";
                  echo "<td><a href='?postupdate&id=".$row['idartikel']."'>edit</a></td>";
                  echo "<td><a href='mysqli/delete.php?id=".$row['idartikel']."'>delete</a></td>";
               echo "</tr>";

                } ?>
            </table>

            <?php $link->close(); } ?>
   </div>