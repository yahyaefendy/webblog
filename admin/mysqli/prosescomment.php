 <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL^E_NOTICE);
    
    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:../login.php');
    }else{
        $user = $_SESSION['email'];
    }

    require_once ('connect.php');

    if (isset($_POST["kirim"])) {

    	$nama = $_POST['nama'];
		$email = $_POST['email'];
		$komen = $_POST['komen'];
		$idartikel = $_POST['idartikel'];

		$sql = "INSERT INTO komentar ( nama, email, komen, idartikel) VALUES ('$nama','$email','$komen','$idartikel')" ;

    	$query = $link->query($sql);
    	if ($query) {
    		header("location:../../detil.php?id=".$idartikel."&status=sukses");
    	}else{
    		header("location:../../detil.php?id=".$idartikel."&status=gagal");
    	}
    }
    	
	$link->close();
?>