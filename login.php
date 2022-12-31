<?php
session_start();

include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$hasil = mysqli_query ($koneksi,$sql);
$jumlah = mysqli_num_rows($hasil);


	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["id"]=$row["id"];
		$_SESSION["username"]=$row["username"];
		$_SESSION["name"]=$row["name"];
		header("Location:index.php");
		
	}else {
		header("Location:user.php");
	}
	if ($_SESSION["username"] == 'admin') {
		header("Location:adminhome.php");
	  }
?>