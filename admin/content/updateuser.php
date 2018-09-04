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


   if (isset($_GET["id"]) && !empty($_GET["id"])) {  
   
   $sql = "SELECT * FROM user WHERE iduser=".$_GET['id'];
   $query = $link->query($sql);

?>

<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="#">Users</a></li>
         <li class="active">Update Users</li>
      </ol>

<!-- form update -->
<div class="col-md-10" style="min-height:600px">
  <div class="col-md-12" style="padding:20px; padding-left:20;padding-right:0;">
    <h3>Edit data user yang tersimpan.</h3>
    <hr>
     <?php if ($query): ?>
      <?php if ($query->num_rows != 0): ?>
        <?php while ($row = $query->fetch_array()): ?>
    <form action="mysqli/update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $row['iduser'] ?>">
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-4">
           <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>">
          </div>
      </div>
      <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat'] ?>">
          </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-4">
          <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
          </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-4">
          <input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>">
          </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="update">Update</button>
        </div>
      </div>
    </form>
     <?php endwhile ?>
      <?php $query->free(); ?>
    <?php endif ?>
  <?php endif ?>
  <?php } ?>
  </div>
</div>
<!-- akhir form update -->
<?php $link->close(); ?>