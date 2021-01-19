<?php
    session_start();
    echo  $_SESSION['ssp'];
?>

<label for="option">Chọn số sản phẩm hiển thị:</label>
<form class="navbar-form navbar-right" name="setting" method="POST" role="Áp dụng" action="">
<select name="ssp" id="ssp" id="option">
  <option value="1">3 sản phẩm</option>
  <option value="2">6 sản phẩm</option>
  <option value="3">9 sản phẩm</option>
  <option value="4">12 sản phẩm</option>
</select>
<button type="submit" name="xacnhan" id= "xacnhan" class="btn btn-primary">cài đặt</button>
</form> 
<?php if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    // Lưu Session
    if($_POST['ssp']==1){
        $_SESSION['ssp'] = "3";
    }
    if($_POST['ssp']==2){
        $_SESSION['ssp'] = "6";
    }
    if($_POST['ssp']==3){
        $_SESSION['ssp'] = "9";
    }
    if($_POST['ssp']==4){
        $_SESSION['ssp'] = "12";
    }
    header('Location: trangchu.php');
}
?>