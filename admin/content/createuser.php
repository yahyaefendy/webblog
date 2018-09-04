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

   $id = $_GET['idartikel'];
   $sql = "SELECT nama, alamat, email, password FROM user";
   $result = $link->query($sql);

?>

<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="#">Users</a></li>
         <li class="active">Create New Users</li>
      </ol>

<!-- form update -->
<div class="col-md-10" style="min-height:600px">
  <div class="col-md-12" style="padding:20px; padding-left:20;padding-right:0;">
    <h3>Buat akun user baru.</h3>
    <hr>

      <?php if (isset($_GET['createuser']) && $_GET['createuser']=="sukses"): ?>
        <div class="alert alert-success">BERHASIL! Akun baru telah terdaftar.</div>        
      <?php endif; ?>

      <?php if (isset($_GET['createuser']) && $_GET['createuser']=="gagal"): ?>
        <div class="alert alert-danger">OPPPS! Akun tidak dapat terdaftar.</div>        
      <?php endif; ?>
    
    <form action="mysqli/prosesregister.php" method="post">
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-4">
           <input type="text" class="form-control" name="nama" value="" placeholder="nama">
          </div>
      </div>
      <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="alamat" placeholder="alamat">
          </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-4">
          <input type="email" class="form-control" name="email" placeholder="email">
          </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-4">
          <input type="password" class="form-control" name="password" placeholder="password">
          </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" value="createuser" name="createuser">Create User</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- akhir form update -->