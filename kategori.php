<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL^E_NOTICE);

  include 'admin/mysqli/connect.php';

  $perpage = 2;

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

  if ($_POST['kategori']=="politik") {
    $sql = "SELECT * FROM artikel WHERE kategori like'%politik%' ORDER BY idartikel DESC LIMIT $start, $perpage";
  }
  elseif ($_POST['kategori']=="pendidikan") {
    $sql = "SELECT * FROM artikel WHERE kategori like'%pendidikan%' ORDER BY idartikel DESC LIMIT $start, $perpage";
  }
  elseif ($_POST['kategori']=="kesehatan") {
    $sql = "SELECT * FROM artikel WHERE kategori like'%kesehatan%' ORDER BY idartikel DESC LIMIT $start, $perpage";
  }
  
  $query = $link->query($sql);

    function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Media Blog</title>

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

                  <?php if ($query): ?>
                    <?php if (($jmlbaris = $query->num_rows ) != 0): ?>
                      <?php while ($row = $query->fetch_array()):
                          $long_string = $row['isi'];
                          $limited_string = limit_words($long_string, 30);
                        ?>
                        <!--artikel-->
                        <div class="card mb-3">
                          <?php
                          echo "<img class='card-img-top' src='admin/mysqli/upload/".$row['img']."' alt='Card image cap'>"; 
                          ?>
                          <div class="card-body">
                            <h2 class="card-title"><a href="detil.php?id=<?php echo $row['idartikel']; ?>"> <?php echo $row['judul']; ?></a></h2>
                            <hr>
                            <p class="card-text"><b><?php echo $row['judul']; ?>.</b> <?php echo $limited_string; ?><a href="detil.php?id=<?php echo $row['idartikel']; ?>">...Baca Selanjutnya</a></p>
                            <p class="card-text">
                              <small class="text-muted"><?php echo "Dilihat ".$row['visitor']." kali"; ?></small>
                              <small class="text-muted"><?php echo "Kategori : ".$row['kategori']; ?></small>
                            </p>
                          </div>
                        <!--akhir artikel-->
                        <br>
                        <br>
                      <?php endwhile ?>
                      <?php $query->free(); ?>
                    <?php endif ?>
                  <?php endif ?>

                  <hr>
                  <?php

                    $halaman = ceil($jmlbaris/$perpage);

                    ?>
                <!-- pagination -->
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <?php 
                      if ($jmlbaris > 2) { 
                        for ($i=1; $i<=$halaman ; $i++) { 
                          echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                        }
                      }
                      ?>  
                    </ul>
                  </nav>
                  <!-- akhir pagination -->

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