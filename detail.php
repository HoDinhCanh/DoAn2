<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/icon_HLB.png" /> -->
    <title>Chi tiết</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
<?php
    session_start();
        include 'menu.php';
?>
   <script>
        $(document).ready(function(){
           $("#guibinhluan").click(function(){
              var url_string = window.location.href;
              var url = new URL(url_string);
              var idsp = url.searchParams.get("item");
                var txt = $("#noidungbinhluan").val();
              $.post("xulybinhluan.php", {noidung: txt, idphone: idsp}, function(result){
                $("#dsbinhluan").append(txt);
              });
           }); 
        });
    </script>
<body>
<?php
            $id = $_GET['item'];
            // if(isset($_SESSION['idusers'])){
            //     $idus = $_SESSION['idusers'];
            // }
            $ketnoi = mysqli_connect("localhost", "root", "", "phones_store");
            $sql = "SELECT * FROM phones WHERE id=$id";
            $ketqua = mysqli_query($ketnoi, $sql);
            $sp = mysqli_fetch_assoc($ketqua);
        ?>
    <div class="container-fluid app-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 main-header-left">
                    <div class="row">
                        <div class="col-sm-7">
                            <img style="height: 300px; wight: 300px;" src="./images/<?php echo $sp['images']; ?>" class="left-img">
                        </div>
                        <div style="top:100px; font-size: 18px;" class="col-sm-5">
                            <div class="detail-title">
                            <h1><b> <?php  echo $sp['phonename'];  ?></b></h1>
                            </div>
                            <div class="details-price">
                            <?php  echo number_format($sp['price'],3).' VND';  ?>
                            </div>
                            <!-- <div class="details-tourism">
                                Chi tiết 
                                <a href=""> Xem chi tiết</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 main-header-right">
                    <div class="right-wrap">
                        <div class="right-infor">
                        </div>
                        <div class="form-group">
                        </div>
                       
                        <div style="padding-top: 100px;" class="book-btn">
                       <?php if (isset($_SESSION["username"])) {?>
                        <p><a href="addcart.php?item=<?php echo $_GET['item'];?>" class="btn btn-success" role="button">Thêm vào giỏ hàng</a></p>
                       <?php }else{?><p><a href="dangnhap1.php" class="btn btn-success" role="button">Đăng nhập để thêm vào giỏ hàng</a></p>
                       <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="program-content-title text-center" >
                <h2>  <b><?php  echo $sp['phonename'];  ?></b></br></h2>
                            </div>
                            <div class="program-content">
                                <h2>Chi tiết sản phẩm</h2>
                                <?php  echo $sp['detail'];  ?>
                            </div>
                <div class="col-sm-12">
                    <div class="details-program">
                        <div class="details-program-title">
                            <span> <h2>Bình luận</h2></span>
                        </div>
                        <div class="details-program-content">
                <div class="program-content-title text-center">
                    <b><?php  echo $sp['phonename'];?></b></br>
                </div>
                <?php
                echo '<hr>';
        ?>
     <?php 
     if(isset($_SESSION['username'])){?>
      <!-- <textarea  name="noidungbinhluan" id="noidungbinhluan"></textarea>
                <script>
                        CKEDITOR.replace( 'noidungbinhluan' );
                </script> -->
                
                <div class="input-group input-group-sm chatMessageControls">
     <input type="text" name="noidungbinhluan" id="noidungbinhluan"class="form-control" placeholder="Type your message here.." aria-describedby="sizing-addon3">
     <span class="input-group-btn">
     <input class="btn btn-primary" type="submit" value="Gửi"  id="guibinhluan" >
     </span>
     </div>   
<?php
     } else {?><p><a href="dangnhap1.php" class="btn btn-success" role="button">Đăng nhập để bình luận</a></p>
     <?php } ?>
     
     <div class="container">
<div class="row">
<?php
            $sql = "SELECT * FROM comment WHERE idphone = $id";
            $ketqua1 = mysqli_query($ketnoi, $sql);
            while($dong = mysqli_fetch_assoc($ketqua1))
            {?>

            

                     <?php   $query = ("SELECT * FROM users where id=".$dong['iduser']);
                             $dms =mysqli_query($ketnoi, $query);;
                             if(mysqli_num_rows($dms)>0){
                              $row = $dms->fetch_assoc();?>

                              <div class="media">
                        <div class="media-left">
                            <img src="http://fakeimg.pl/50x50" class="media-object" style="width:40px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading title"><?php echo $row['username']; ?></h4>
                            <p class="komen">
                            <?php echo$dong['comment']; ?><br>
                            <a href=""><?php echo $dong['date']; ?></a>
                            </p>
                        </div>
                    </div>
                            <?php $query = ("SELECT * FROM adcomment where id=".$dong['idtrl']);
                             $dms =mysqli_query($ketnoi, $query);;
                             if(mysqli_num_rows($dms)>0){
                              $row = $dms->fetch_assoc();?>
                            <div class="geser">
                            <div class="media">
                            <div class="media-left">
                            <img src="http://fakeimg.pl/50x50" class="media-object" style="width:40px">
                            </div>
                            <div class="media-body">
                            <h4 class="media-heading title" style="color: Red">Admin</h4>
                            <p class="komen">
                            <?php echo $row['comment']; ?><br>
                                <a href=""><?php echo $row['date']; ?></a>
                            </p>
                            </div>
                        </div>
                        </div>

                            <?php }?>
                               <?php

                             }else{
                                ?><?php echo 'NULL';
                            } ?>

                
            <?php
                // $row1 = mysqli_fetch_assoc($ketqua2);
                // echo"<p>".$dong['comment'].'<p><hr>';
            }
        ?>



    
</div>
</div>      

     

        </div>

       


                    <div id="dsbinhluan">
                    </div>

                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<style>

#sendMessageButton {
    
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    
}
.title {
    font-size: 14px;
    font-weight:bold;
}
.komen {
    font-size:14px;
}
.geser {
    margin-left:55px;
    margin-top:5px;
}


</style>