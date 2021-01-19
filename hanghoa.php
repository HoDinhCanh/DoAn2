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
$result = mysqli_query($conn, 'select count(id) as total from phones');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
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
$result = mysqli_query($conn, "SELECT * FROM phones LIMIT $start, $limit"); 
  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách hàng hoá</title>
</head>
<body>
<?php include 'menu.php';?>
<h1>Chào Admin</h1>
<div class="form">
<h1>Hàng hoá</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên Điện thoại</th>
      <th scope="col">Hãng</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Giá tiền</th>
      <th scope="col">Link ảnh</th>
      <th scope="col">Chi tiết</th>
      <th scope="col">Quyền Admin</th>
    </tr>
  </thead>
  
  <tbody>
    <?php
       $ii = 1;
      // while ($row = $rs->fetch_assoc()) {
        while ($row = mysqli_fetch_assoc($result)){
         $query1 = ("SELECT * FROM category where id=".$row['idcategory']);
         $dms1 = $conn->query($query1);
        echo "<tr>";
        echo "<td>" .$ii."</td>";
        echo "<td>" .$row['phonename']."</td>";
        if(mysqli_num_rows($dms1)>0){
          $row1 = $dms1->fetch_assoc();
          echo "<td >".$row1['category']."</td>";
          echo "<td >".$row1['category']."</td>";
        }
        else {
          echo "<td >Chưa chọn</td>";
        }
        echo  "<td>" .number_format($row['price'],3).' VND';"</td>";
        if(isset($row['images'])){
          echo "<td >".$row['images']."</td>";
        }else echo "<td> Chưa chọn ảnh </td>";
          echo "<td><a href='detailhh.php?id=".$row['id']."'>Nhấn để sửa</a></td>";
        echo  "<td><a href='updatehh.php?id=".$row['id']."'>Sửa</a> || <a href='deletehh.php?id=".$row['id']."'>Xóa</a></td>";
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
  echo '<a href="hanghoa.php?page='.($current_page-1).'">Prev</a> | ';
  }
  // Lặp khoảng giữa
  for ($i = 1; $i <= $total_page; $i++){
  // Nếu là trang hiện tại thì hiển thị thẻ span
  // ngược lại hiển thị thẻ a
  if ($i == $current_page){
  echo '<span>'.$i.'</span> | ';
  }
  else{
  echo '<a href="hanghoa.php?page='.$i.'">'.$i.'</a> | ';
  }
  }
  // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
  if ($current_page < $total_page && $total_page > 1){
  echo '<a href="hanghoa.php?page='.($current_page+1).'">Next</a> | ';
  } 
?>
</div>
<p>Bảng điều khiển</p>
<a href="themhh.php">Thêm sản phẩm</a>
<p>Đây cũng là một trang được bảo mật</p>
<p><a href="trangchu.php">Trang chủ</a></p>
<a href="#.php">Đăng xuất</a>

<!-- <a href="logout.php">Đăng xuất</a> -->-
</div>
</body>
</html>