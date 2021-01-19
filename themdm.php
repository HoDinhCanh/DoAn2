<?php
require('database.php');
include('auth-dash.php');
// $ID = $_GET['id'];
// $query = "SELECT * FROM hanghoa WHERE ID = '$ID'";
// $rs = $con->query($query);
// $row = $rs->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục</title>

        <!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="update/vendor/bootstrap/css/bootstrap.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="update/fonts/font-awesome-4.7.0/css/font-awesome.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="update/fonts/Linearicons-Free-v1.0.0/icon-font.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="update/vendor/animate/animate.css"> -->
<!--===============================================================================================-->	
	<!-- <link rel="stylesheet" type="text/css" href="update/vendor/css-hamburgers/hamburgers.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="update/vendor/animsition/css/animsition.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="update/vendor/select2/select2.min.css"> -->
<!--===============================================================================================-->	
	<!-- <link rel="stylesheet" type="text/css" href="update/vendor/daterangepicker/daterangepicker.css"> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="update/css/util.css">
	<link rel="stylesheet" type="text/css" href="update/css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Add category
					</span>
				</div>

				<form class="login100-form validate-form" action="xl_themdm.php" method="POST" >
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Tên danh mục</span>
						<input class="input100" type="text" name="category" id="" placeholder="Tên danh mục" value="">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">

                    <input type="submit" value="Thêm danh mục" class="login100-form-btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>