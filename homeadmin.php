<?php session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

//memanggil file berisi fungsi2 yang sering dipakai
require "fungsi.php";
require "head.html";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Home Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.css">
	<script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
	<script src="bootstrap-5.3.3-dist/jquery/jquery-3.7.1.min.js"></script>

</head>
<body>
    <div class="utama">
	    <br><br>
	    <h1 class="text-center">Selamat Datang di Halaman Administrator saudara <?php echo strtoupper($_SESSION['username']);?></h1>
    </div>
</body>
</html>	
