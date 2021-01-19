
<?php
    $mess = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $u = $_POST["username"];
        $p = $_POST["password"];
        $p1 = $_POST["re_password"];
        $ma = $_POST["email"];
        $conn = mysqli_connect("localhost","root","","phones_store");
        $sql = "SELECT id FROM users WHERE username = '$u'";
        $kq = mysqli_query($conn, $sql);
        if (mysqli_num_rows($kq) > 0)
        {
            $mess = "Tên đăng nhập này đã tồn tại";
        }
        else{

        if($p== $p1)
        {
            $sql= "INSERT INTO users(username, password, Email, role) VALUES('$u','$p','$ma','khách')";
            $ketqua = mysqli_query($conn,$sql);
            $mess = "Bạn đã đăng ký thành công";
            
        }
        else {$mess = "Mật khẩu không trùng khớp";}
    } }  
?>
<!-- <html>
    <head>
        <meta charset="utf-8">
        <title>Đăng ký</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body> -->

        
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="su_si/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="su_si/css/style.css">

</head>
<body>
<?php 
    session_start();
    include 'menu.php' ?>
    <div class="main" style="margin-top:-150px;">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container" >
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="first_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="first_name" placeholder="Tên đăng nhập"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý tất cả các <a href="#" class="term-service">Điều khoản sử dụng</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="su_si/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="dangnhap1.php" class="signup-image-link">Đã có tài khoản</a>
                    </div>
                 
            </div>
		</section>
</body>
<script src="su_si/vendor/jquery/jquery.min.js"></script>
    <script src="su_si/js/main.js"></script>

