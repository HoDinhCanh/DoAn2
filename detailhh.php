<?php
session_start();
include("menu.php");
 ?>
<html>
<head>

  <?php
   $conn=mysqli_connect("localhost","root","","phones_store");
if(isset($_POST['submit'])){
// $tenhang=$_POST['phonename'];
// $dongia=$_POST['price'];
//   $iddanhmuc=$_POST['iddcategory'];
$mieuta=$_POST['mieuta'];
  $sql = "UPDATE phones SET detail='$mieuta' WHERE id=".$_GET['id'];

  $ketqua = mysqli_query($conn, $sql);
}
?>

  <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
</head>

<body>


  <h1 style="text-align: Center;">Sửa Hàng hóa</h1>



  <form action="" method="POST" enctype="multipart/form-data">
    <?php

 if (isset($_GET['id']))
 {
    $conn=mysqli_connect("localhost","root","","phones_store");
     $sql = "SELECT * FROM phones WHERE id=".$_GET['id'] ;
     $ketqua = mysqli_query($conn, $sql); 
    $row1 = mysqli_fetch_assoc($ketqua); 
  }
    ?>
    <div class="container">
      <center>
        <table class="table">
          <tr>
            <td>
              Tên Mặt hàng:
              <?php echo $row1['phonename']; ?>
            </td>
          </tr>
          <tr>
            <td>
              Đơn giá:
              <?php echo "123"; ?>
            </td>
          </tr>
          <tr>
            <td>
              Danh mục:
                <?php
 $sql = "SELECT * FROM category where id=".$row1['idcategory'];
 $ketqua = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($ketqua);
 echo $row['category'];
// $sql = "SELECT * FROM category";
//  $ketqua = mysqli_query($conn, $sql);
//   while ($row = mysqli_fetch_assoc($ketqua))
// {
// if($row['iddanhmuc']!=$row1['iddanhmuc']){
//   echo '<option value="'.$row['iddanhmuc'].'" '.$selected.'>' .$row['tendanhmuc'].'</option>';
// }
 
// }
 ?>
            </td>
          </tr>
          <tr>
            <td>
              <textarea name="mieuta" id="mieuta" class="form-control ckeditor"><?php echo $row1['detail'];?></textarea>
              <script>
                CKEDITOR.replace('mieuta', {
                  height: 300,
                  filebrowserUploadUrl: "upimgck.php"
                });
              </script>
            </td>
          </tr>

        </table>
        <input type="submit" name='submit' class="btn btn-primary" value="Sửa">
      </center>
    </div>






  </form>

</body>

</html>