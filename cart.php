

<html>
<h2 class="text-center">Giỏ hàng</h2>
<div class="container"> 
 <table id="cart" class="table table-hover table-condensed"> 
  <thead> 
   <tr> 
    <th style="width:50%">Tên sản phẩm</th> 
    <th style="width:10%">Giá(VND)</th> 
    <th style="width:8%">Số lượng</th> 
    <th style="width:22%" class="text-center">Thành tiền</th> 
    <th style="width:10%"> </th> 
   </tr> 
  </thead> 
  <tbody><tr> 
   <td data-th="Product"> 

   <form action="" method="POST">
<?php
 session_start();
 $ok=1;
 $tongTien = 0;
 $connect=mysqli_connect("localhost","root","","phones_store");
 if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $k => $v)
    {
    if(isset($k))
    {
    $ok=2;
    }
    }
}
    if($ok == 2){
 foreach($_SESSION['cart'] as $key=>$value)
{
 
$item[]=$key; 
}
$str=implode(",",$item);

$sql="SELECT * FROM phones WHERE id IN ($str)";
$query=mysqli_query($connect,$sql);
$price=0;
if(isset($_POST['capnhat'])){
    foreach($_SESSION['cart'] as $key=>$value)
    {
    $_SESSION['cart'][$key]=$_POST[$key];
    }
 }

if(mysqli_num_rows($query) > 0)
{
    
while($row=mysqli_fetch_array($query))
{?>
    <div class="row"> 
     <div class="col-sm-2 hidden-xs"><img style="dipslay: auto;height:auto; wight: auto; margin-top: 20px;" src="./images/<?php echo $row['images']; ?>"alt="<?php echo "<h3>$row[phonename]</h3>"; ?>" class="img-responsive" width="100">
     </div> 
     <div class="col-sm-10"> 
      <h4 class="nomargin"><?php echo "<h3>$row[phonename]</h3>"; ?></h4> 
      <p><?php echo "Shop: $row[idseller] ";?></p> 
     </div> 
    </div> 
    </td> 
   <td data-th="Price"><?php echo number_format($row['price'],3);?></td> 
   <td data-th="Quantity"><?php echo "<input type='number' name='".$row['id']."' min='1' max='50' id='' value='".$_SESSION['cart'][$row['id']]."'> <br>"; ?>
   </td> 
   <td data-th="Subtotal" class="text-center"><?php echo number_format($_SESSION['cart'][$row['id']]*$row['price'],3)."VND";
            $price+=$_SESSION['cart'][$row['id']]*$row['price'];?></td> 
   <td class="actions" data-th="">
   <?php echo "<p align='right'><a href='addcart.php?id=$row[id]'>Mua </a></p>"; 
   echo "<p align='right'><a href='delcart.php?item=$row[id]'>Xoá</a></p>";
   ?>

    </button>
   </td> 
  </tr> 
  <tr> 
   <td data-th="Product"> 
    <div class="row"> 
     <!-- <div class="col-sm-2 hidden-xs"><img src="" alt="Sản phẩm 1" class="img-responsive" width="100"> -->
     </div> 
     <div class="col-sm-10"> 
<?php
  $tongTien+=$_SESSION['cart'][$row['id']]*$row['price'];
}} }?>
    
</tbody><tfoot> 
   <tr> 
    <td><a href="trangchu.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
    </td>
    <td>
    <?php echo "<p class='btn btn-success btn-block' align='right'><a href='delcart.php?item=0'>Xoá tất cả</a></p>"; 
   ?>
    </td>
   
    <?php 
        if(!isset($_SESSION['cart'])){echo 'Không có sản phẩm nào trong giỏ hàng';}
    echo "<input class='btn btn-success btn-block' type='submit' value='Cập nhật' name ='capnhat'>"; 
   ?>
 
    
    <td colspan="2" class="hidden-xs"> </td> 
    <td class="hidden-xs text-center"><strong><?php echo  $tongTien.".000 VND";  ?></strong>
    </td> 
   
<td>
    <!-- <a href="" name="muahang" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
    <button name="muahang" id="muahang" class="btn btn-success btn-block">Thanh toán 1</button> -->
    <input type="submit" value="Thanh toán 2" class="btn btn-success btn-block" name="muahang">
    </td>

     
   </tr> 
  </tfoot> 
 </table>
</form>

</html>

<?php
        if(isset($_POST['muahang'])){
          if(isset($_SESSION['idusers'])){
            $iduser= $_SESSION['idusers'];
            $sql="INSERT INTO invoice( `iduser`, `tongtien`,trangthai) VALUES('$iduser','$tongTien', 'Chưa xác nhận');";   
            $ketqua=mysqli_query($connect,$sql);
            $row1= mysqli_insert_id($connect);
           
            $sql1="SELECT * FROM phones WHERE id IN($str)";
            $ketqua1=mysqli_query($connect,$sql1);
            while($row=mysqli_fetch_assoc($ketqua1)){
              $sql3="INSERT INTO ivdetails( idhoadon, idhanghoa, dongia, soluong) values($row1,$row[id],$row[price],".$_SESSION['cart'][$row['id']].")";
              $ketqua2=mysqli_query($connect,$sql3);
            //   $sqlhh="SELECT  `soluong` FROM `hanghoa` WHERE idhanghoa=".$row['idhanghoa'];
            //   $ketqua1=mysqli_query($connect,$sqlhh);
            //   $rowhh=mysqli_fetch_assoc($ketqua1);
            //   $soluong=$rowhh['soluong']-$_SESSION['giohang'][$row['idhanghoa']];
            //   $sql1="UPDATE hanghoa SET soluong=$soluong WHERE idhanghoa=".$row['idhanghoa'];
            //   $ketqua1=mysqli_query($connect,$sql);
            //   $ketqua1=mysqli_query($connect,$sql1);
            //     echo  $ketqua=mysqli_query($connect,$sql);
            //     echo $ketqua=mysqli_query($connect,$sql);
            }
          unset($_SESSION['cart']);
          if ($sql3) {
            # code...
            header("location: cart.php");
        }
        }
        
        else if(!isset($_SESSION['cart'])){echo 'Không có sản phẩm nào trong giỏ hàng';}
         if ($sql3) {
        # code...
        header("location: cart.php");
    }
    }
   
   ?>












<style type="text/css">.table&amp;amp;gt;tbody&amp;amp;gt;tr&amp;amp;gt;td, .table&amp;amp;gt;tfoot&amp;amp;gt;tr&amp;amp;gt;td {  
vertical-align: middle;
}
 
@media screen and (max-width: 600px) { 
table#cart tbody td .form-control { 
width:20%; 
display: inline !important;
} 
 
.actions .btn { 
width:36%; 
margin:1.5em 0;
} 
 
.actions .btn-info { 
float:left;
} 
 
.actions .btn-danger { 
float:right;
} 
 
table#cart thead {
display: none;
} 
 
table#cart tbody td {
display: block;
padding: .6rem;
min-width:320px;
} 
 
table#cart tbody tr td:first-child {
background: #333;
color: #fff;
} 
 
table#cart tbody td:before { 
content: attr(data-th);
font-weight: bold; 
display: inline-block;
width: 8rem;
} 
 
table#cart tfoot td {
display:block;
} 
table#cart tfoot td .btn {
display:block;
}
}</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
<script src="assets/js/jquery-1.10.2.js"></script>





















