<?php
session_start();
?>
<?php
				
				$mess = '';
				if ($_SERVER["REQUEST_METHOD"]=="POST")
				{
					$u = $_POST["username"];
					$p = $_POST["password"];
					$conn = mysqli_connect("localhost","root","","phones_store");
					$sql = "SELECT * FROM users WHERE username = '$u' and password = '$p'";
					$ketqua = mysqli_query($conn, $sql);
					if (mysqli_num_rows($ketqua)>0)
					{
						$row = mysqli_fetch_assoc($ketqua);
						$mess = "Bạn đã đăng nhập thành công";
						$_SESSION["quyenhan"] = $row["role"];
						$_SESSION["username"] = $row["username"];
                        $_SESSION["idusers"] = $row["id"];
						if (isset($_SESSION["quyenhan"])&& $_SESSION["quyenhan"]=="khách") {
			
                        header('Location: trangchu.php?id='.$_SESSION["quyenhan"]);

                        } 
                        if (isset($_SESSION["quyenhan"])&& $_SESSION["quyenhan"]=="admin") {
			
                            header('Location: danhmuc.php?id='.$_SESSION["quyenhan"]);
    
                            } 
					}
					else
					{
						$mess = "Sai tên đăng nhập hoặc mật khẩu";
					}
				}    
			?>
			
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="su_si/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="su_si/css/style.css">
</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="su_si/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="dangki.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" name= "action" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Tài khoản"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="mậtn khẩu"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Nhớ mật khẩu</label>
							</div>
							<div style="color: Red">
                        <?php  echo $mess ;?>
                   			 </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	
    </div>

    <!-- JS -->
    <script src="su_si/vendor/jquery/jquery.min.js"></script>
    <script src="su_si/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>



 

