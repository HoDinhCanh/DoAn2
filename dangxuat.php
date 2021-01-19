<?php
session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["quyenhan"]);
	unset($_SESSION["idusers"]);
	header("location: trangchu.php");
?>
<html>
<h1>Bạn đã đăng xuất</h1>
<div><a href="trangchu.php">Về trang chủ</a></div>
</html>