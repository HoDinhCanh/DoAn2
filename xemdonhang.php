<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đơn hàng</title>
</head>

<body>
  <?php
   session_start();
   include 'menu.php';
    ?>

  <?php
    // if(isset($_GET['hoadon'])){
    // // $sql1 = "SELECT * FROM invoice where tenkhachhang=".$_GET['hoadon']; 
    // //         $ketqua1 = mysqli_query($conn, $sql1); 
    //     //     while ($row1=mysqli_fetch_assoc($ketqua1)){
    //     //         $sql2 = "SELECT * FROM phones where id=".$row1['idhanghoa']; 
                
    //     //     $ketqua2 = mysqli_query($conn, $sql2); 
    //     //     while ($row2=mysqli_fetch_assoc($ketqua2)){

    //     //     }
    //     // }
    // $ketqua=mysqli_query($conn,$sql);
    // $sql="DELETE FROM `invoice` WHERE id=".$_GET['hoadon'];
    // $ketqua=mysqli_query($conn,$sql);
    // $sql="DELETE FROM `ivdetail` WHERE idhoadon=".$_GET['hoadon'];
    // $ketqua=mysqli_query($conn,$sql);
    
    // } 

    ?>
  <?php  
    if(isset($_SESSION['idusers'])){?>
  <div class="container">
    <p class="text-center">Các đơn hàng</p>
    <table class="table">
      <a href=""></a>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên hàng</th>
          <th scope="col">Ảnh</th>
          <th scope="col">giá tiền</th>
          <th>Sửa/Xóa</th>
        </tr>
      </thead>
      <tbody>
      <?php
                           

      ?>
        <?php 
        
        $i=0; 
        $conn = mysqli_connect('localhost', 'root', '', 'phones_store');
        if(isset($_GET["hoadon"])){
            //  $sql1 = "SELECT * FROM invoice where id=".$_GET['hoadon']; 
            //        $ketqua1 = mysqli_query($conn, $sql1); 
            //        $row1=mysqli_fetch_assoc($ketqua1);
                //   while ($row1=mysqli_fetch_assoc($ketqua1)){
                //       $sql2 = "SELECT * FROM hanghoa where idhanghoa=".$row1['idhanghoa']; 
                     
                //     $ketqua2 = mysqli_query($conn, $sql2); 
                //     while ($row2=mysqli_fetch_assoc($ketqua2)){
    
                
                //     $sl=$row1['soluong']+$row2['soluong'];
                //     $sql="UPDATE `hanghoa` SET `soluong`=$sl WHERE idhanghoa=".$row1['idhanghoa'];
                //   }
                // }
                // if($row1['trangthai']=='Chưa xác nhận'){
            $sql="DELETE FROM `ivdetails` WHERE idhoadon=".$_GET['hoadon'];
            $ketqua=mysqli_query($conn,$sql);
            $sql="DELETE FROM `invoice` WHERE id=".$_GET['hoadon'];
            $ketqua=mysqli_query($conn,$sql);
                // }
                // else header("location: xemdonhang.php");
           } 
        $iddangnhap=$_SESSION['idusers'];
        $sql = "SELECT * FROM invoice where iduser ='$iddangnhap'"; 
        $ketqua = mysqli_query($conn, $sql);
       
        while ($row=mysqli_fetch_assoc($ketqua)){
            $sql1 = "SELECT * FROM ivdetails where idhoadon=".$row['id']; 
            $ketqua1 = mysqli_query($conn, $sql1); 
        
            while ($row1=mysqli_fetch_assoc($ketqua1)){
            $sql2 = "SELECT * FROM phones where id=".$row1['idhanghoa']; 
          
            $ketqua2 = mysqli_query($conn, $sql2); 
            while ($row2=mysqli_fetch_assoc($ketqua2)){
              $i++; 
            echo "<tr><td>$i</td>";
            echo "<td>".$row2['phonename']." Số lượng ".$row1['soluong']."</td>";
           
            ?>
        <td><img src="./images/<?php echo $row2['images'];?>" height="100px" width="100px" alt=""></td>
       
        <?php echo "<td>".$row1['dongia']."</td>";
        
            }
        }echo "<td>".$row1['dongia']."</td>";
        if($row['trangthai']=='Chưa xác nhận'){
            ?>

        <td><a href="?hoadon=<?php echo $row['id'];?>" class="btn btn-danger">Xóa</a>
        </td>
        </tr>
        <?php
            }
            else if($row['trangthai']=="Đã xác nhận"){
                ?>
                <td>đã xác nhận
        </td>
        </tr>
            <?php
        }
        else if($row['trangthai']=="Đang giao hàng"){
            ?>
            <td>Đang giao hàng
    </td>
    </tr>
        <?php
    }
        else{
            ?>
            <td>Giao hàng và thanh toán
                </td>
                </tr>
              
                <?php  
        
                        }
    }  } else{
    echo " <center style=height:30vh>Đăng nhập để kiểm tra đơn hàng </center>";
    }
    $i++
    ?>
      </tbody>
    </table>
  </div>
                        
</body>

</html>