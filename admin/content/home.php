<?php 
    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:../login.php');
    }else{
        $user = $_SESSION['email'];
    }
?>
    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
          <li class="active">Home</li>
      </ol>
   </div>
   <div class="col-md-10" style="min-height:600px">
    <center><h3><b>Welcome to, Administrator Media Blog</b></h3></center>
	<hr>
    
    <table class="table table-hover">
      <tr align="center">
          <td colspan="3" class="info"><b>Data Diri</b></td>  
      </tr>
      <tr>
        <td class="info"><b>Nama</b></td>
        <td>:</td>
        <td>Yahya Efendy</td>
      </tr>
      <tr>
        <td class="info"><b>Tempat, Tanggal Lahir</b></td>
        <td>:</td>
        <td>Wonogiri, 06 Januari 1998</td>
      </tr>
      <tr>
        <td class="info"><b>Jenis Kelamin</b></td>
        <td>:</td>
        <td>Laki-laki</td>
      </tr>
      <tr>
        <td class="info"><b>Alamat</b></td>
        <td>:</td>
        <td>Ngembar RT.02/RW.05, Geneng, Bulukerto, Wonogiri, Jawa Tengah</td>
      </tr>
      <tr>
        <td class="info"><b>Harapan</b></td>
        <td>:</td>
        <td>
          Besar harapan saya untuk bergabung di perusahaan yang Bapak/Ibu pimpin. Berpartisipasi dalam mengembangkan teknologi dan sistem yang berada diperusahan AsiaCommerce.
        </td>
        
      </tr>
    </table>	
   </div>