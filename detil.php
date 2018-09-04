<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL^E_NOTICE);

  include 'admin/mysqli/connect.php';

  $sql = "SELECT * FROM artikel WHERE idartikel=".$_GET['id'];
  $query = $link->query($sql);
  $row = $query->fetch_array();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> <?= $row['judul'] ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="home" id="home">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="jumbotron">
              <div class="row">
                <div class="col-sm-4 text-center">
                </div>
                <div class="col-sm-8">
                  <!--navigasi-->
                  <ul class="nav nav-pills" role="tablist">
                    <li role="presentation"><a href="index.php">Home</a></li>
                    <li role="presentation"><a href="artikel.php">Articles</a></li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategori
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li>
                          <form method="post" action="kategori.php">
                              <button type="submit" name="kategori" value="politik" class="btn btn-primary btn-block">Politik</button>
                          </form>
                        </li>
                        <li>
                          <form method="post" action="kategori.php">
                              <button type="submit" name="kategori" value="pendidikan" class="btn btn-primary btn-block">Pendidikan</button>
                          </form>
                        </li>
                        <li>
                          <form method="post" action="kategori.php">
                              <button type="submit" name="kategori" value="kesehatan" class="btn btn-primary btn-block">Kesehatan</button>
                          </form>
                        </li>
                      </ul>
                    </li>
                    <li role="presentation"><a href="about.php">About Me</a></li>
                    <li role="presentation"><a href="login.php"><button type="button" class="btn btn-primary btn-m">Login</button></a></li>
                  </ul>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                  <hr>
                  <!--akhir navigasi-->
                        <!--artikel-->
                        <div class="card mb-3">
                          <?php
                          echo "<img class='card-img-top' src='admin/mysqli/upload/".$row['img']."' alt='Card image cap'>"; 
                          ?>
                          <div class="card-body">
                            <h2 class="card-title"><a href="detil.php?id=<?php echo $row['idartikel']; ?>"> <?php echo $row['judul']; ?></a></h2>
                            <p class="card-text"><?php echo $row['isi']; ?></p>
                            <p class="card-text">
                              <small class="text-muted"><?php echo "Dilihat ".$row['visitor']." kali"; ?></small>
                              <small class="text-muted"><?php echo "Kategori : ".$row['kategori']; ?></small>
                            </p>
                          </div>
                        <!--akhir artikel-->
                        <br>
                        <?php 

                        $visitor = $row['visitor']+1;
                        $id = $row['idartikel'];
                        if (isset($id)) {
                            //$visitor+1;
                            $updatevisitor = "UPDATE artikel SET visitor='$visitor' WHERE idartikel='$id'";
                            $link->query($updatevisitor);
                        }
                            
                            

                         ?>
                        <br>
                        <!-- from komentar -->
                        <hr>
                        <h4>Comment</h4>
                        <br>
                        <form action="admin/mysqli/prosescomment.php" method="post">
                          <div class="form-group row">
                            <div class="col-sm-6">
                              <label>Nama</label>
                              <input name="nama" type="nama" class="form-control" placeholder="masukkan nama">
                            </div>
                            <div class="col-sm-6">
                              <label>Email</label>
                              <input name="email" type="email" class="form-control" placeholder="masukkan email">
                            </div>
                          </div>
                          <div class="form-group">
                            <textarea name="komen" class="form-control" rows="3" placeholder="masukkan komentar"></textarea>
                          </div>
                          <input type="hidden" name="idartikel" value="<?= $row['idartikel'] ?>">
                          <button type="submit" class="btn btn-primary" name="kirim">Comment</button>
                        </form>
                        <!--  akhir from komentar -->
                  <hr>
                  <?php 

                      $sql_komen = "SELECT * FROM komentar WHERE idartikel=".$row['idartikel'];
                      $query_komen = $link->query($sql_komen);
                      
                      while ($komen = $query_komen->fetch_array()):
                  ?>
                        
                  <strong><?= $komen['nama'] ?></strong><br>
                  <div><?= $komen['email'] ?></div><br>
                  <p><?= $komen['komen'] ?></p>
                  <hr>

                   <?php endwhile ?>
                  <hr>
                  <dir class="row">
                    <h6 class="text-right">Media Blog By Yahya Efendy      Email:yahya.efendy.rye@gmail.com</h6>
                  </dir>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php $link->close(); ?>