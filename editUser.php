<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Data User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap-5.3.3-dist/jquery/jquery-3.7.1.min.js"></script>
	<script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$iduser=$_GET['kode'];
	$sql="select * from user where iduser='$iduser'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT DATA USER</h2>	
		<div class="row">
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editUser.php">
				<div class="form-group">
					<label for="username">Username:</label>
					<input class="form-control" type="text" name="username" id="username" value="<?php echo $row['username']?>" readonly>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input class="form-control" type="password" name="password" id="password" value="<?php echo $row['password']?>">
				</div>
				<div class="form-group">
					<label for="status">Status:</label>
                    <select class="form-control" name="status" id="status" required>
                    <option value="" selected disabled>Pilih Status</option>
                    <option value="dosen">Dosen</option>
                    <option value="mhs">Mahasiswa</option>
                    <option value="admin">Admin</option>
                    <option value="tu">TU</option>
                </select> value="<?php echo $row['status']?>">
                </div> 
				</div>				
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
				<input type="hidden" name="iduser" id="iduser" value="<?php echo $iduser?>">
			</form>
		</div>
		</div>
	</div>
	
</body>
</html>