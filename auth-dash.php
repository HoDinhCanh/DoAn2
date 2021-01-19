
<?php
session_start();
if(!isset($_SESSION["quyenhan"])){
header("Location: dangnhap.php");
exit(); }
?>
