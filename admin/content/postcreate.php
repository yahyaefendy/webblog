<?php
    ini_set('display_errors','On');
    error_reporting(E_ALL^E_NOTICE);

    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:../login.php');
    }else{
        $user = $_SESSION['email'];
    }
?>
<div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="#">Articles</a></li>
         <li class="active">Create Articles</li>
      </ol>

<!-- form update -->
<div class="col-md-10" style="min-height:600px">
  <div class="col-md-12" style="padding:20px; padding-left:20;padding-right:0;">
    <h3>Buat artikel baru anda.</h3>
    <hr>

    <?php if (isset($_GET['postcreate']) && $_GET['postcreate']=="sukses"): ?>
        <div class="alert alert-success">BERHASIL! Artikel anda telah dipulikasikan.</div>        
    <?php endif; ?>


    <?php if (isset($_GET['postcreate']) && $_GET['postcreate']=="gagal"): ?>
        <div class="alert alert-danger">OOPPPPSS! Artikel gagal dipublikasikan!</div>        
    <?php endif; ?>

    <?php if (isset($_GET['postcreate']) && $_GET['postcreate']=="lengkapi"): ?>
        <div class="alert alert-danger">OOPPPPSS! Lengkapi semua kolom anda!</div>        
    <?php endif; ?>
    
    <form action="mysqli/prosespost.php" method="post" enctype="multipart/form-data" >
      <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
          <div class="col-sm-8">
           <input type="text" class="form-control" id="judul" placeholder="judul" name="judul">
          </div>
      </div>
      <div class="form-group row">
        <label for="posting" class="col-sm-2 col-form-label">Post</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="posting" placeholder="Tulis artikel anda !" name="isi"></textarea>
          </div>
      </div>
      <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-8">
            <label class="btn btn-default btn-file">
            Browse file... <input type="file" style="display: none;" name="image">
            </label>
          </div>
      </div>
      <fieldset class="form-group">
        <div class="row">
          <label for="posting" class="col-sm-2 col-form-label">Kategori</label>
          <div class="col-sm-10">
            <div class="form-check">
                <label>
                  <input type="checkbox" name="kategori[]" value="politik" checked> <span class="label-text">Politik</span>
                </label>
            </div>
            <div class="form-check">
                <label>
                  <input type="checkbox" name="kategori[]" value="pendidikan"> <span class="label-text">Pendidikan</span>
                </label>
            </div><div class="form-check">
                <label>
                  <input type="checkbox" name="kategori[]" value="kesehatan"> <span class="label-text">Kesehatan</span>
                </label>
            </div>
          </div>
        </div>
      </fieldset>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="kirim" value="kirim">Post Articles</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- akhir form update -->
