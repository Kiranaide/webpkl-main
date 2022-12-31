<?php
require 'koneksi.php';
$conn = mysqli_connect('localhost','root','','pklflash');
$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM products WHERE id='$id'");

if (mysqli_affected_rows($conn)>0){
    echo"<script>
    alert('Data berhasil dihapus');
    document.location.href='admineditdelete.php';
    </script>";
}
?>