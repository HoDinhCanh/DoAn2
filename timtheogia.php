<?php
session_start();
if(isset($GET["gia"]))
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chu</title>
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
</head>

<?php

// PHẦN XỬ LÝ PHP
// BƯỚC 1: KẾT NỐI CSDL
$conn = mysqli_connect('localhost', 'root', '', 'phones_store');
// BƯỚC 2: TÌM TỔNG SỐ RECORDS
$result = mysqli_query($conn, 'select count(id) as total from phones');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
if(isset($_SESSION["ssp"])){
    $limit = $_SESSION["ssp"];
}
else{$limit = 6;}
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);
// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page){
$current_page = $total_page;
}
else if ($current_page < 1){
$current_page = 1;
}
// Tìm Start
$start = ($current_page - 1) * $limit;
// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
if($_GET["gia"]==1){
$result = mysqli_query($conn, "SELECT * FROM phones WHERE price <=2000 LIMIT $start, $limit");
}
if($_GET["gia"]==2){
    $result = mysqli_query($conn, "SELECT * FROM phones WHERE price >=2000 AND price <=10000 LIMIT $start, $limit");
    }
if($_GET["gia"]==3){
        $result = mysqli_query($conn, "SELECT * FROM phones WHERE price >10000 LIMIT $start, $limit");
        }
?>
<body>
<?php

                include 'menu.php';
?>
       <div class="container">
        
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Danh mục
                    </a>
                    <ul class="list-group">
                    <?php
                        $connect=mysqli_connect("localhost","root","","phones_store");
                        $sql1="select * from category";
                        $query1=mysqli_query($connect,$sql1);
                        if(mysqli_num_rows($query1) > 0)
                        {
                        while($row1=mysqli_fetch_array($query1))
                        {
                            ?>
                        <li class="list-group-item"><?php echo  '<a href="timtheodanhmuc.php?id='.$row1['id'].'">'.$row1['category'].'</a>';?>
                        </li>
 <?php
}
}
?>
                    </ul>
                </div>
                <div>
                <a href="#" class="list-group-item active">Tìm kiếm theo giá
                    </a>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item"><a href="timtheogia.php?gia=1">Sản phẩm dưới 2 triệu VND </a></li>
                        <li class="list-group-item list-group-item"><a href="timtheogia.php?gia=2">Sản phẩm từ 2 đến 10 triệu VND</a></li>
                        <li class="list-group-item list-group-item"><a href="timtheogia.php?gia=3">Sản phẩm trên 10 triệu VND</a></li>

                    </ul>
                </div>
                <!-- /.div -->
                <div class="well well-lg offer-box offer-colors">


                    <span class="glyphicon glyphicon-star-empty"></span>25 % off  , Mua ngay                 
              
                   <br />
                    <br />
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                            style="width: 70%">
                            <span class="sr-only">70% Complete (success)</span>
                            2hr 35 mins còn lại
                        </div>
                    </div>
                    <a href="#">Nhấn vào đây để biết thêm </a>
                </div>
                <!-- /.div -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Điện thoại</a></li>
                        <!-- <li class="active">Electronics</li> -->
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                    <form class="navbar-form navbar-right" name="search" method="POST" role="Tìm kiếm" action="search.php">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Nhập tên sách" class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" name="ok" class="btn btn-primary">Tìm</button>
                </form>

                <!-- <form class="navbar-form navbar-right" name="setting" method="POST" role="Áp dụng" action="">
                    <div class="form-group">
                        <input type="text" name="ssp" id="ssp" placeholder="Số sản phẩm cần hiện" class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" name="xacnhan" id= "xacnhan" class="btn btn-primary">cài đặt</button>
                </form> 
                 -->
                </div></div>
                <!-- /.row -->
                <div class="row">
<?php
    while ($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                             <img style="height: 200px; wight: 400px;" src="./images/<?php echo $row['images']; ?>" alt="" />
                            <div class="caption">
                            <?php echo "<h3><a href='chitiet.php?id=$row[id]'>$row[phonename]</a></h3>";?> 
                                <p>Tên: <strong><?php echo $row['phonename']; ?></strong>  </p>
                                <p>Giá : <strong> <?php echo number_format($row['price'],3); ?>
                                VND<br /></strong>  </p>
                                <?php
                                if(isset($_SESSION["username"])) {?>
                                <p><a href="addcart.php?item=<?php echo $row['id'];?>" class="btn btn-success" role="button">Thêm vào giỏ hàng</a>
                                <?php
                                }else{
                                    ?>
                                        <p><a href="dangnhap1.php" class="btn btn-success" role="button">Đăng nhập để đặt hàng</a>
                                    <?php
                                }
                                ?>
                                 <a href="detail.php?item=<?php echo $row['id'];?>" class="btn btn-primary" role="button">Chi tiết</a></p>
                                
                            </div>
                        </div>
                    </div>
 <?php
}
?>
                </div>
                <!-- /.row -->

                <div class="row">
                <ul class="pagination alg-right-pad">
            <?php
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $total_page > 1){
    echo '<li><a href="trangchu.php?page='.($current_page-1).'">&laquo;</a> </li> ';
    }
    // Lặp khoảng giữa
    for ($i = 1; $i <= $total_page; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page){
    echo '<li><span>'.$i.'</span> </li>';
    }
    else{
    echo '<li><a href="trangchu.php?page='.$i.'">'.$i.'</li> </a>';
    }
    }
    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
    if ($current_page < $total_page && $total_page > 1){
    echo '<li><a href="trangchu.php?page='.($current_page+1).'">&raquo;</a></li> ';
    }

            ?>
            </ul>
            </div>
                <!-- /.row -->
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="col-md-12 download-app-box text-center">

        <span class="glyphicon glyphicon-download-alt"></span>Tải ứng dụng của chúng tôi và được giảm giá 10% tất cảc các sản phẩm . <a href="#" class="btn btn-danger btn-lg">Tải ngay</a>

    </div>

    <!--Footer -->
    <div class="col-md-12 footer-box">
        <div class="row">
            <div class="col-md-4">
                <strong>Giải đáp thắc mắc </strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Tên">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Địa chỉ Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Tin nhắn"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Đồng ý gửi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <strong>Địa chỉ của chúng tôi</strong>
                <hr>
                <p>
                     Đà Nẵng,<br />
                                    Đại học Đà Nẵng<br />
                    Call: 0934746662<br>
                    Email: hdcanh.19it3@sict.udn.vn<br>
                </p>

                2020 www.canhho.com | All Right Reserved
            </div>
            <div class="col-md-4 social-box">
                <strong>Xã hội </strong>
                <hr>
                <a href="#"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-3x "></i></a>
                <p>
                    Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. Hồ Đình Cảnh. 
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2020 | &nbsp; All Rights Reserved | &nbsp; www.winshop.com | &nbsp; 24/7 support | &nbsp; Email us: hdcanh.19it3@vku.udn.vn
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="assets/js/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="assets/ItemSlider/js/jquery.catslider.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>
<?php if (isset($_POST['ssp']))
{
    // Lưu Session
    $_SESSION['ssp'] = $_POST['ssp'];
    header('Location: trangchu.php');
}
?>
<?php
if($_GET["gia"]){
    $sql = "SELECT * FROM banhang WHERE price < 200";
    $query1 = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($query1) ){
        ?>
    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                             <img style="height: 200px; wight: 400px;" src="./images/<?php echo $row['linkimage']; ?>" alt="" />
                            <div class="caption">
                               <?php echo "<h3><a href='chitiet.php?id=$row[id]'>$row[title]</a></h3>";?> 
                                <p>Tác giả : <strong><?php echo $row['author']; ?></strong>  </p>
                                <p>Giá : <strong> <?php echo number_format($row['price'],3); ?>
                                VND<br /></strong>  </p>
                                <?php
                                if(isset($_SESSION["username"])) {?>
                                <p><a href="addcart.php?item=<?php echo $row['id'];?>" class="btn btn-success" role="button">Thêm vào giỏ hàng</a>
                                <?php
                                }else{
                                    ?>
                                        <p><a href="dangnhap1.php" class="btn btn-success" role="button">Đăng nhập để đặt hàng</a>
                                    <?php
                                }
                                ?>
                                 <a href="detail.php?item=<?php echo $row['id'];?>" class="btn btn-primary" role="button">Chi tiết</a></p>
                                
                            </div>
                        </div>
                    </div>
 <?php
    } 
}
?>
</body>
</html>

