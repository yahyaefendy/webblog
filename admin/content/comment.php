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

    $perpage = 6;

    if (isset($_GET['page'])) {
    $page = $_GET['page'];
    }else{
        $page = 1;
    }

    if ($page > 1) {
        $start = ($page * $perpage) - $perpage;
    }else{
        $start = 0;
    }

   $sql = "SELECT * FROM komentar ORDER BY idkomentar DESC LIMIT $start, $perpage";
   $result = $link->query($sql);

?>

    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li class="active">Articles</li>
      </ol>
      </div>
       <div class="col-md-10" style="min-height:600px">
        <div class="col-md-12" style="padding:20px; padding-left:20;padding-right:0;">
          
          <h3>Semua komentar tentang artikel anda.</h3>
          <hr>

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
         </div>

         <?php if ($result) { ?>

            <table class="table table-hover">
               
               <tr>
                  <th class="info">Nama</th>
                  <th class="info">Email</th>
                  <th class="info">Komentar</th>
                  <th class="info">Action</th>
               </tr>
               <?php while ($row = mysqli_fetch_array($result)) {
               echo "<tr>";
                  echo "<td>".$row['nama'] . "</td>";
                  echo "<td>".$row['email'] . "</td>";
                  echo "<td>".$row['komen'] . "</td>";
                  echo "<td><a href='mysqli/deletecomment.php?id=".$row['idkomentar']."'>delete</a></td>";
               echo "</tr>";

                } ?>

            </table>

             <?php 
              
              } 

              $data = mysqli_query($link, "SELECT * FROM komentar");
              $jmlbaris = mysqli_num_rows($data);

              $halaman = ceil($jmlbaris/$perpage);

              ?>
                <!-- pagination -->
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <?php 
                        for ($i=1; $i<=$halaman ; $i++) { 
                          echo "<li class='page-item'><a class='page-link' href='?comment=$i'>$i</a></li>";
                        }
                      ?>  
                    </ul>
                  </nav>
                  <!-- akhir pagination -->
   </div>
<?php $link->close(); ?>
