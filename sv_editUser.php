<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$iduser=$_POST["iduser"];
$username=$_POST["username"];
$password=$_POST["password"];
$status=$_POST["status"];


//membuat query
$sql="update user set username='$username',
					  password  ='$password',
                      status  ='$status'
					  where iduser='$iduser'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateUser.php");
?>