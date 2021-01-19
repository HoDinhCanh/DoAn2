<?php
//  require('database.php');
//  include('auth-dash.php');
// $query = ("SELECT * FROM books");
// $rs = $con->query($query);
// include("auth.php");
  session_start();
?>
<?php
  // PHẦN XỬ LÝ PHP
// BƯỚC 1: KẾT NỐI CSDL
$conn = mysqli_connect('localhost', 'root', '', 'phones_store');
// BƯỚC 2: TÌM TỔNG SỐ RECORDS
$result = mysqli_query($conn, 'select count(id) as total from invoice');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 8;     
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
$result = mysqli_query($conn, "SELECT * FROM invoice LIMIT $start, $limit"); 
  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách hàng hoá</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<h1>Chào Admin</h1>
<div class="form">
<h1>Hoá đơn</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên người dùng</th>
      <th scope="col">Ngày</th>
      <th scope="col">Sản phẩm</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Quyền Admin</th>
    </tr>
  </thead>

  <tbody>
  
    <?php
   
 
if(isset($_GET["hoadon"])){
    // $sql1 = "SELECT * FROM ivdetails where idhoadon=".$_GET['hoadon']; 
    //       $ketqua1 = mysqli_query($conn, $sql1); 
        //   while ($row1=mysqli_fetch_assoc($ketqua1)){
        //       $sql2 = "SELECT * FROM hanghoa where idhanghoa=".$row1['idhanghoa']; 
             
        //     $ketqua2 = mysqli_query($conn, $sql2); 
        //     while ($row2=mysqli_fetch_assoc($ketqua2)){

        
        //     $sl=$row1['soluong']+$row2['soluong'];
        //     $sql="UPDATE `hanghoa` SET `soluong`=$sl WHERE idhanghoa=".$row1['idhanghoa'];
        //   }
        // }
    $sql="DELETE FROM `ivdetails` WHERE idhoadon=".$_GET['hoadon'];
    $ketqua=mysqli_query($conn,$sql);
    $sql="DELETE FROM `invoice` WHERE id=".$_GET['hoadon'];
    $ketqua=mysqli_query($conn,$sql);
    $message = 'Đơn hàng của bạn đã được hủy!';

   
   
   } 
   if(isset($_GET['xacnhan'])){
    $xacnhan="Đã xác nhận";
    $conn = mysqli_connect("localhost", "root", "", "phones_store");
    $sql5 = "SELECT iduser FROM invoice where id=".$_GET['id']; 
    $ketqua5 = mysqli_query($conn, $sql5); 
    $row5=mysqli_fetch_assoc($ketqua5);
    $sql6 = "SELECT Email FROM users where id=".$row5['iduser']; 
    $ketqua6 = mysqli_query($conn, $sql6); 
    $row6=mysqli_fetch_assoc($ketqua6);
    $sql4="UPDATE invoice SET trangthai='$xacnhan' WHERE id=".$_GET['id'];
    $ketqua1=mysqli_query($conn,$sql4);
    $message = 'Đơn hàng của bạn đã được xác nhận!';
    $to = $row6['Email'];
    $subject="Win shop";
    $headers = "From: Hodinhcanh@gmail.canh.com\r\n";
    mail($to, $subject, $message, $headers);
    if ($sql4) {
        # code...
        header("location: qldonhang.php");
    }
  }
   if(isset($_GET['danggiaohang'])){
    $xacnhan="Đang giao hàng";
    $conn = mysqli_connect("localhost", "root", "", "phones_store");
    $sql5 = "SELECT iduser FROM invoice where id=".$_GET['id']; 
    $ketqua5 = mysqli_query($conn, $sql5); 
    $row5=mysqli_fetch_assoc($ketqua5);
    $sql6 = "SELECT Email FROM users where id=".$row5['iduser']; 
    $ketqua6 = mysqli_query($conn, $sql6); 
    $row6=mysqli_fetch_assoc($ketqua6);
    $sql2="UPDATE invoice SET trangthai='$xacnhan' WHERE id=".$_GET['id'];
    $ketqua1=mysqli_query($conn,$sql2);
    $message = 'Đơn hàng của bạn đang được vận chuyển!';
    $to = $row6['Email'];
    $subject="Win shop";
    $headers = "From: Hodinhcanh@gmail.canh.com\r\n";
    mail($to, $subject, $message, $headers);
    if ($sql2) {
        # code...
        header("location: qldonhang.php");
    }
  }
  if(isset($_GET['thanhtoan'])){
    $xacnhan="Giao hàng và thanh toán";
    $conn = mysqli_connect("localhost", "root", "", "phones_store");
    $sql5 = "SELECT iduser FROM invoice where id=".$_GET['id']; 
    $ketqua5 = mysqli_query($conn, $sql5); 
    $row5=mysqli_fetch_assoc($ketqua5);
    $sql6 = "SELECT Email FROM users where id=".$row5['iduser']; 
    $ketqua6 = mysqli_query($conn, $sql6); 
    $row6=mysqli_fetch_assoc($ketqua6);
    $sql3="UPDATE invoice SET trangthai='$xacnhan' WHERE id=".$_GET['id'];
    $ketqua1=mysqli_query($conn,$sql3);
    $message = 'Đơn hàng của bạn đã được thanh toán!';
    $to = $row6['Email'];
    $subject="Win shop";
    $headers = "From: Hodinhcanh@gmail.canh.com\r\n";
    mail($to, $subject, $message, $headers);
    if ($sql3) {
        # code...
        header("location: qldonhang.php");
    }
     
  }
       
        $ii = 1;
       
      // while ($row = $rs->fetch_assoc()) {
        while ($row = mysqli_fetch_assoc($result)){
         $query1 = ("SELECT * FROM users where id=".$row['iduser']);
         $dms1 = $conn->query($query1);
        echo "<tr>";
        echo "<td>" .$ii."</td>";
        // echo "<td>" .$row['username']."</td>";
        if(mysqli_num_rows($dms1)>0){
          $row1 = $dms1->fetch_assoc();
          echo "<td>" .$row1['username']."</td>";
        //   echo "<td >".$row1['category']."</td>";
        //   echo "<td >".$row1['category']."</td>";
        }
        else {
          echo "<td >Chưa chọn</td>";
        }
        echo "<td>" .$row['ngay']."</td>";
            $query2 = "SELECT * FROM ivdetails where idhoadon=".$row['id']; 
            $ketqua2 = mysqli_query($conn, $query2);
?><td><?php
            while ($row2 = mysqli_fetch_assoc($ketqua2)){
                $query3 = ("SELECT * FROM phones where id=".$row2['idhanghoa']);
                $ketqua3= mysqli_query($conn, $query3);
                $row3 = mysqli_fetch_assoc($ketqua3);
                echo $row3['phonename'].", ";
            }
            ?></td><?php


        echo  "<td>" .number_format($row['tongtien'],3).' VND';"</td>";

        //   echo "<td><a href='#.php?id=".$row['id']."'>Nhấn để sửa</a></td>";
?>
   <td>       
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: firebrick"> <?php echo $row['trangthai']; ?>
  <span class="caret"></span></button>
  <form action="" method="GET">
    <div class="dropdown-menu">
        <?php
        if($row['trangthai']=="Chưa xác nhận"){
            echo '<a class="dropdown-item"><input type="submit" name="xacnhan" value="Xác nhận"></a>
            <a class="dropdown-item"><input type="submit" name="dangiaohang" value="Đang giao hàng"></a>
            <a class="dropdown-item"><input type="submit" name="giaohang" value="Giao hàng và thanh toán"></a>';
            echo '<input hidden name="id" value="' .$row['id'].'">';
        } else if($row['trangthai']=="Đã xác nhận"){
            echo '<a class="dropdown-item"><input type="submit" name="danggiaohang" value="Đang giao hàng"></a>';
            echo '<a class="dropdown-item"><input type="submit" name="thanhtoan" value="Giao hàng và thanh toán"></a>';
            echo '<input hidden name="id" value="' .$row['id'] .'">';

        } else if($row['trangthai']=="Đang giao hàng"){
            echo '<a class="dropdown-item"><input type="submit" name="thanhtoan" value="Giao hàng và thanh toán"></a>';
            echo '<input hidden name="id" value="' .$row['id'] .'">';
        }
        ?>
    </div>
  </form>
</div>
</td>
<?php

        echo  "<td><a href='chitietdonhang.php?id=$row[id]'>Chi tiết</a> ||<a href='?hoadon=$row[id]' class='btn btn-danger'>Xóa</a>";
        echo "</tr>";
        $ii++;
      }
    ?>
  </tbody>
</table>
<div class="row btn-group alg-right-pad">
<?php
// PHẦN HIỂN THỊ PHÂN TRANG
// BƯỚC 7: HIỂN THỊ PHÂN TRANG
// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $total_page > 1){
  echo '<a href="qldonhang.php?page='.($current_page-1).'">Prev</a> | ';
  }
  // Lặp khoảng giữa
  for ($i = 1; $i <= $total_page; $i++){
  // Nếu là trang hiện tại thì hiển thị thẻ span
  // ngược lại hiển thị thẻ a
  if ($i == $current_page){
  echo '<span>'.$i.'</span> | ';
  }
  else{
  echo '<a href="qldonhang.php?page='.$i.'">'.$i.'</a> | ';
  }
  }
  // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
  if ($current_page < $total_page && $total_page > 1){
  echo '<a href="qldonhang.php?page='.($current_page+1).'">Next</a> | ';
  } 
?>
</div>
<p>Bảng điều khiển</p>
<p>Đây cũng là một trang được bảo mật</p>
<p><a href="trangchu.php">Trang chủ</a></p>
<a href="dangxuat.php">Đăng xuất</a>||<a href="danhmuc.php">Danh mục</a>||<a href="hanghoa.php">Hàng hoá</a>||<a href="danhmuc.php">Danh mục</a>||<a href="qldonhang.php">Đơn hàng</a>||<a href="qlbinhluan.php">Bình luận</a>

<!-- <a href="logout.php">Đăng xuất</a> -->-
</div>
</body>
</html>