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
                  <h4 class="text-center">Silahkan Buat Akun Anda !</h4>
                  <br>
                    <?php if (isset($_GET['status']) && $_GET['status']=="gagal"): ?>
                      <div class="alert alert-danger text-center">OPPPS! Data gagal disimpan</div>        
                    <?php endif; ?>
                  <!--akhir navigasi-->
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8">

                    <!-- form register -->
                    <form action="admin/mysqli/prosesregister.php" method="post">
                      <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Nama" name="nama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  placeholder="Alamat" name="alamat">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control"  placeholder="Email" name="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control"  placeholder="Password" name="password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary" name="kirim" value="kirim">Sign up</button>
                          <h4>sudah punya akun? <a href="login.php"> sign in.</a></h4>
                        </div>
                      </div>
                    </form>
                    <!-- akhir form register -->

                  </div>
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