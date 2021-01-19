<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div  class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="trangchu.php"><strong>Win</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                


                <ul class="nav navbar-nav navbar-right">
                    <li>
                    <?php
                    if (isset($_SESSION["quyenhan"])&& $_SESSION["quyenhan"]=="admin") {?>
                        <li><a href="danhmuc.php">Danh mục</a></li>
                        <li><a href="hanghoa.php">Hàng hoá</a></li>
                        <li><a href="qldonhang.php?page=1">Đơn hàng</a></li>
                        <li><a href="qlbinhluan.php">Bình luận</a></li>
                        <li><a href="thanhvien.php">Thành viên</a></li>

                    <?php
                    }
                    else{?>
                    <?php
                        if (isset($_SESSION["quyenhan"])&& $_SESSION["quyenhan"]=="khách") {?>
                        
                        <li><a href="xemdonhang.php">Đơn hàng</a></li>
                        <li><a href="caidat.php">Cài đặt</a></li>
                        <li> <a href="cart.php"><img style = "display: block; max-width: 25px; max-height: 25px; width: auto; height: auto;" src="./images/carticon.png" alt=""></a></li></li>
                       
                    <?php } else{?>
                        <li><a href="caidat.php">Cài đặt</a></li>
                            <li><a href="dangnhap1.php">Đăng nhập</a></li>
                            <li><a href="dangki.php">Đăng ký</a></li>  
                   <?php } ?>
                    <?php } ?>
                        
                    
                    
                    <li style="color: white; padding-top:15px" >
                        <?php
                            if(isset($_SESSION["username"])){
                            echo "Chào ".$_SESSION["username"];
                            
                        ?>
                    <li><a href="dangxuat.php">Đăng xuất</a></li>
                    <?php } ?>
                    </li>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hỗ trợ <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>SĐT: </strong>0934746662</a></li>
                            <li><a href="#"><strong>Email: </strong>hdcanh.19IT3@vku.udn.vn</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Địa chỉ: </strong>
                                <div>
                                    Học tại Đà Nẵng<br />
                                        Sống tại Huế
                                </div>
                            </a></li>
                        </ul>
                    </li> -->
                    <li>
                        
                    </li>
                    
                </ul>
                <!-- <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Tìm</button>
                </form> -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
