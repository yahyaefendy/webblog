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
   
               $perpage = 2;

               if (isset($_GET['postall'])) {
                 $page = $_GET['postall'];
               }else{
                $page = 1;
               }

               if ($page > 1) {
                 $start = ($page * $perpage) - $perpage;
               }else{
                $start = 0;
               }

    $sql = "SELECT * FROM artikel ORDER BY idartikel DESC LIMIT $start, $perpage";
    $query = $link->query($sql);

?>
    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li class="active">Articles</li>
      </ol>
      </div>
       <div class="col-md-10" style="min-height:600px">
        <div class="col-md-12" style="padding:20px; padding-left:20;padding-right:0;">
          <div class="col-md-8">
            <h3>Semua artikel anda.</h3>
          </div>
          <div class="col-md-4" style="padding:10px; padding-left:0;padding-right:0;">
            <form class="form-horizontal" role="search" method="post" action="?postsearch">
                <div class="col-md-8 col-xs-12">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari Artikel Disini...">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" type="submit" name="cari">Cari <span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>
         </div>
         <div class="col-md-12">
          <?php if (isset($_GET['postall']) && $_GET['postall']=="delete"): ?>
            <div class="alert alert-success text-center">BERHASIL! Artikel dihapus. :-) </div>        
          <?php endif; ?>


          <?php if (isset($_GET['postall']) && $_GET['postall']=="gagaldelete"): ?>
            <div class="alert alert-danger text-center">OOOPPPSS! Artikel gagal dihapus. :-) </div>        
          <?php endif; ?>


          <?php if (isset($_GET['postall']) && $_GET['postall']=="update"): ?>
            <div class="alert alert-success text-center">BERHASIL! Artikel diupdate. :-) </div>        
          <?php endif; ?>


          <?php if (isset($_GET['postall']) && $_GET['postall']=="gagalupdate"): ?>
            <div class="alert alert-danger text-center">OOOPPPSS! Artikel gagal diupdate. :-) </div>        
          <?php endif; ?>

         </div>

          
          <?php if ($query) { ?>

            <table class="table table-hover">
               
               <tr>
                  <th class="info">Judul</th>
                  <th class="info">Isi</th>
                  <th class="info">Image</th>
                  <th class="info">Kategori</th>
                  <th class="info">Visitor</th>
                  <th class="info" colspan="2">Action</th>
               </tr>
               <?php 

               while ($row = mysqli_fetch_array($query)) {
               echo "<tr>";
                  echo "<td>".$row['judul'] . "</td>";
                  echo "<td>".$row['isi'] . "</td>";
                  echo "<td><img class='img-circle' src='mysqli/upload/".$row['img'] . "' height='100px' width='100px'></td>";
                  echo "<td>".$row['kategori'] . "</td>";
                  echo "<td>".$row['visitor'] . "</td>";
                  echo "<td><a href='?postupdate&id=".$row['idartikel']."'>edit</a></td>";
                  echo "<td><a href='mysqli/delete.php?id=".$row['idartikel']."'>delete</a></td>";
               echo "</tr>";  

                } ?>
            </table>

            <?php 
              
              } 

              $data = mysqli_query($link, "SELECT * FROM artikel");
              $jmlbaris = mysqli_num_rows($data);

              $halaman = ceil($jmlbaris/$perpage);

              ?>
                <!-- pagination -->
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <?php 
                        for ($i=1; $i<=$halaman ; $i++) { 
                          echo "<li class='page-item'><a class='page-link' href='?postall=$i'>$i</a></li>";
                        }
                      ?>  
                    </ul>
                  </nav>
                  <!-- akhir pagination -->
   </div>
   <?php $link->close(); ?>