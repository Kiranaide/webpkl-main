<?php
require 'koneksi.php';
$conn = mysqli_connect('localhost','root','','pklflash');
$id = $_GET["id"];
mysqli_query($conn, "UPDATE cart SET status = 'Selesai' WHERE id = '$id'");

if (mysqli_affected_rows($conn)>0){
    echo"<script>
    alert('Data berhasil diupdate!');
    document.location.href='adminmember.php';
    </script>";
}
?>