<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL^E_NOTICE);

  include 'admin/mysqli/connect.php';

  $perpage = 3;

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

  $sql = "SELECT * FROM artikel ORDER BY idartikel DESC LIMIT $start, $perpage";
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
                  <img src="img/vespa.jpg" class="img-circle">
                    <h1>Media Blog</h1>
                      <h6>Web Blog | Blogger | YouTuber</h6>
                      <hr>
                      <h5 class="text-justify">Kami adalah pengembang website profesional yang siap membantu Anda dalam merencanakan, menciptakan, memelihara dan memasarkan produk atau organisasi melalui website. Kami terbiasa bekerja menggunakan CMS populer yang ramah pengguna dan Framework yang menjamin keamanan dan kecepatan website.</h5>
                </div>
                <div class="col-sm-8">
                  <!--navigasi-->
                  <ul class="nav nav-pills" role="tablist">
                    <li role="presentation"><a href="#">Home</a></li>
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
                  <hr>
                  <!--akhir navigasi-->

                  <!--thumbnail-->
                  <div class="row">
                    <?php if ($query): ?>
                      <?php if ($query->num_rows > 0):

                         ?>
                        <?php while ($row = $query->fetch_array()): ?>
                          <div class="col-sm-12">
                            <div class="thumbnail">
                              <?php

                                $long_string = $row['isi'];
                                $limited_string = limit_words($long_string, 30);
                              ?>
                              <h3> <a href="detil.php?id=<?php echo $row['idartikel']; ?>"> <?php echo $row['judul']; ?></a></h3>
                              <?php
                                echo "<img class='card-img-top' src='admin/mysqli/upload/".$row['img']."' alt='Card image cap' height='1000px' width='1000px'>"; 
                              ?>
                              <div class="caption">
                                
                                <p style="font-size: 13px;"><?php echo $limited_string; ?><a href="detil.php?id=<?php echo $row['idartikel']; ?>">...Baca Selanjutnya</a></p>
                              </div>
                            </div>
                          </div>
                        <?php endwhile ?>
                      <?php $query->free(); ?>
                    <?php endif ?>
                  <?php endif ?>
                  </div>
                  <!--akhir thumbnail-->
                  <?php
                    $data = mysqli_query($link, "SELECT * FROM artikel");
                    $jmlbaris = mysqli_num_rows($data);

                    $halaman = ceil($jmlbaris/$perpage);

                    ?>
                <!-- pagination -->
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <?php 
                        for ($i=1; $i<=$halaman ; $i++) { 
                          echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                        }
                      ?>  
                    </ul>
                  </nav>
                  <!-- akhir pagination -->

                  <hr>
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