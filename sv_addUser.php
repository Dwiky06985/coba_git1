<?php
    include "fungsi.php"; // masukan konekasi DB

    // ambil variable
    $username=$_POST['username'];
    $password=$_POST['password'];
    $status=$_POST['status'];
    
    
// simpan data
$sql="insert user values('','$username','$password','$status')";
    mysqli_query($koneksi,$sql);
    echo "Data telah tersimpan";
//header("location:addUser.php");
?>